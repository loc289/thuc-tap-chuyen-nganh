<?php

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
        Schema::table('orders', function (Blueprint $table) {
            $table->integer('wallet_charge_id');
        });

        Schema::dropColumns('wallet_charges', ['order_id']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropColumns('orders', ['wallet_charge_id']);

        Schema::table('wallet_charges', function (Blueprint $table) {
            $table->integer('order_id');
        });
    }
};
