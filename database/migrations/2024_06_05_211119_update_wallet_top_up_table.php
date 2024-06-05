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
            $table->enum(
                'status',
                [
                    config('constants.top_up_status_pending'),
                    config('constants.top_up_status_success'),
                    config('constants.top_up_status_failed'),
                ]
            )->default(config('constants.top_up_status_pending'))->after('amount');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('wallet_top_ups', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
};
