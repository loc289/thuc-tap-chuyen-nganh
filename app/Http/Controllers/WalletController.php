<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Nation;
use App\Models\WalletTopUp;
use Exception;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class WalletController extends Controller
{
    public function __construct()
    {
        $nations = Nation::all();
        View::share('nations', $nations);

        $categories = Category::all();
        View::share('categories', $categories);
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function show(): Renderable
    {
        $wallet = Auth::guard('web')->user()->wallet;

        $wallet->topUps()
            ->where('status', config('constants.top_up_status_pending'))
            ->where('deadline', '<', now())
            ->update(['status' => config('constants.top_up_status_failed')]);

        return view('pages/wallet', ['wallet' => $wallet]);
    }

    public function top_up()
    {
        $wallet = Auth::guard('web')->user()->wallet;
        $top_up = new WalletTopUp();
        $top_up->wallet_id = $wallet->id;
        $amount = request()->amount;
        $top_up = new WalletTopUp();
        $top_up->wallet_id = $wallet->id;
        $top_up->amount = $amount;
        $top_up->deadline = now()->addMinutes(15);
        $top_up->save();

        $vnp_Url = $this->generate_payment_url($amount, $top_up);

        return redirect($vnp_Url);
    }

    public function top_up_pay($id)
    {
        $top_up = WalletTopUp::find($id);

        if ($top_up == NULL) {
            request()->session()->flash('error', "Lịch sử nạp tiền không tồn tại. Vui lòng thử lại.");
            return redirect()->route('web.wallet');
        }

        $vnp_Url = $this->generate_payment_url($top_up->amount, $top_up);
        return redirect($vnp_Url);
    }

    public function vnpay_return()
    {
        $vnp_SecureHash = $_GET['vnp_SecureHash'];
        $inputData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, config('vnpay.vnp_HashSecret'));

        if ($secureHash == $vnp_SecureHash) {
            if ($_GET['vnp_ResponseCode'] == '00') {
                request()->session()->flash('success', "Nạp tiền thành công! Số tiền " . number_format($_GET['vnp_Amount'] / 100) . " VNĐ đã được cộng vào ví của bạn.");
            } else {
                request()->session()->flash('error', "Nạp tiền thất bại! Vui lòng thử lại.");
            }
        } else {
            request()->session()->flash('error', "Giao dịch không hợp lệ");
        }

        sleep(5);

        return redirect()->route('web.wallet');
    }

    public function vnpay_ipn()
    {
        $inputData = array();
        $returnData = array();
        foreach ($_GET as $key => $value) {
            if (substr($key, 0, 4) == "vnp_") {
                $inputData[$key] = $value;
            }
        }

        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
        }

        $secureHash = hash_hmac('sha512', $hashData, config('vnpay.vnp_HashSecret'));
        $vnp_Amount = $inputData['vnp_Amount'] / 100;
        $top_up_id = explode('_', $inputData['vnp_TxnRef'])[2];

        try {
            if ($secureHash == $vnp_SecureHash) {
                $top_up = WalletTopUp::find($top_up_id);

                if ($top_up != NULL) {
                    if ($top_up->amount == $vnp_Amount) {
                        if ($top_up->status == config('constants.top_up_status_pending')) {
                            if ($inputData['vnp_ResponseCode'] == '00' && $inputData['vnp_TransactionStatus'] == '00') {
                                $top_up->status = config('constants.top_up_status_success');
                            } else {
                                $top_up->status = config('constants.top_up_status_failed');
                            }

                            unset($inputData['vnp_SecureHash']);
                            unset($inputData['vnp_SecureHashType']);

                            $top_up->payment_info = json_encode($inputData);
                            $top_up->save();

                            $wallet = $top_up->wallet;
                            $wallet->balance += $vnp_Amount;
                            $wallet->save();

                            $returnData['RspCode'] = '00';
                            $returnData['Message'] = 'Confirm Success';
                        } else {
                            $returnData['RspCode'] = '02';
                            $returnData['Message'] = 'Order already confirmed';
                        }
                    } else {
                        $returnData['RspCode'] = '04';
                        $returnData['Message'] = 'invalid amount';
                    }
                } else {
                    $returnData['RspCode'] = '01';
                    $returnData['Message'] = 'Order not found';
                }
            } else {
                $returnData['RspCode'] = '97';
                $returnData['Message'] = 'Invalid signature';
            }
        } catch (Exception $e) {
            $returnData['RspCode'] = '99';
            $returnData['Message'] = 'Unknow error';
        }

        return response()->json(json_encode($returnData));
    }

    public function vnpay_result()
    {
        request()->session()->reflash();

        return redirect()->route('web.wallet');
    }

    /**
     * @param mixed $amount
     * @param WalletTopUp $top_up
     * @return string
     */
    public function generate_payment_url(mixed $amount, WalletTopUp $top_up): string
    {
        $vnp_Amount = $amount;
        $vnp_Locale = 'vn';
        $vnp_BankCode = '';
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
        $startTime = date('YmdHis');
        $vnp_HashSecret = config('vnpay.vnp_HashSecret');
        $vnp_TxnRef = implode('_', [$startTime, rand(1, 10000), $top_up->id]);
        $inputData = array(
            "vnp_Version" => "2.1.1",
            "vnp_TmnCode" => config('vnpay.vnp_TmnCode'),
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => $startTime,
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:" . str($vnp_TxnRef),
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => config('vnpay.vnp_Returnurl'),
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => date('YmdHis', strtotime('+15 minutes', strtotime($startTime)))
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }
        $vnp_Url = config('vnpay.vnp_Url') . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash = hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }

        return $vnp_Url;
    }
}