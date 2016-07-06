<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $fillable = [
        'name', 'l_name', 'gender', 'age', 'times_parked', 'total_duration', 
        'avg_duration', 'total_charged',
    ];

    public function cars() {
        return $this->hasMany(Car::class);
    }
}
