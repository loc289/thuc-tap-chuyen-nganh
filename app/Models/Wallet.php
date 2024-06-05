<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'balance',
    ];

    public function topUps(): HasMany
    {
        return $this->hasMany(WalletTopUp::class);
    }

    public function charges(): HasMany
    {
        return $this->hasMany(WalletCharge::class);
    }
}
