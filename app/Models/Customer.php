<?php

namespace App\Models;

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
    ];

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function checkFavorite($movie_id)
    {
        return $this->favorites()->where('movie_id', $movie_id)->exists();
    }
}
