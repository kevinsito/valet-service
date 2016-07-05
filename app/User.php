<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'l_name', 'gender', 'age',
    ];

    // public function cars() {
    //     return $this->hasMany(Car::class);
    // }
}
