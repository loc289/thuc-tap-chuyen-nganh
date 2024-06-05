<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Nation;
use App\Models\WalletTopUp;
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

        return view('pages/wallet', ['wallet' => $wallet]);
    }

    public function top_up()
    {
        $wallet = Auth::guard('web')->user()->wallet;
        $top_up = new WalletTopUp();
        $top_up->wallet_id = $wallet->id;
        $amount = request()->amount;
        $top_up->amount = $amount;
        $top_up->save();

        $wallet->balance += request()->amount;
        $wallet->save();

        request()->session()->flash('success', "Nạp tiền thành công! Số tiền ".number_format($amount)." VNĐ đã được cộng vào ví của bạn.");

        return redirect()->route('web.wallet');
    }
}
