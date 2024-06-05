<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class WalletCharge extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_id',
        'amount',
    ];

    public function order(): HasOne
    {
        return $this->hasOne(Order::class);
    }
}
