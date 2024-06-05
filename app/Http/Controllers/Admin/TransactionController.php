<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Customer;
use App\Models\User;
use App\Models\Wallet;
use App\Models\WalletTopUp;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wallets = Wallet::all();

        $total_income = 0;

        foreach ($wallets as $wallet) {
            $total_income += $wallet->balance;
        }

        $top_ups = WalletTopUp::paginate(config('view.default_pagination'));

        $data = [
            'total_income' => $total_income,
            'top_ups' => $top_ups,
        ];

        return view('admin.transaction.index', $data);
    }
}
