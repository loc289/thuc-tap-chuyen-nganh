<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    protected $guard_name = 'web';

    protected $guard = 'web';

    protected $fillable = [
        'email',
        'password',
        'name',
        'google_id',
        'username',
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class, 'customer_id', 'id');
    }

    public function checkFavorite($movie_id)
    {
        return $this->favorites->where('movie_id', $movie_id)->isNotEmpty();
    }

    public function movies(): HasManyThrough
    {
        return $this->hasManyThrough(
            Movie::class,
            Order::class,
            'customer_id',
            'id',
            'id',
            'movie_id'
        );
    }

    public function checkMyMovie($movie_id): bool
    {
        return $this->movies->where('id', $movie_id)->isNotEmpty();
    }

    public function wallet(): HasOne
    {
        return $this->hasOne(Wallet::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    public function wallet_charges(): HasManyThrough
    {
        return $this->hasManyThrough(WalletCharge::class, Wallet::class);
    }
}
