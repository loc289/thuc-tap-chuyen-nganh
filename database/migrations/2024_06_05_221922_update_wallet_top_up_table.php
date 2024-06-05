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
        Schema::table('wallet_top_ups', function (Blueprint $table) {
            $table->dateTime(
                'deadline'
            )->default(now()->addMinutes(15))->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wallet_top_ups', function (Blueprint $table) {
            $table->dropColumn('deadline');
        });
    }
};
