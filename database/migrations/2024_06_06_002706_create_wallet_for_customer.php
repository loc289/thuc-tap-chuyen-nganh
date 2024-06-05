<?php

use App\Models\Customer;
use App\Models\Wallet;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $customer_dont_have_wallets = Customer::all()->filter(function ($customer) {
            return empty($customer->wallet);
        });

        foreach ($customer_dont_have_wallets as $customer) {
            Wallet::create([
                'customer_id' => $customer->id,
                'balance' => 0
            ]);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
