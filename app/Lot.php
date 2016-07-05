<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = [
        'total_spots',
    ];

    public function cars() {
    	return $this->hasMany(Car::class);
    }

    public function lots_revenue() {
    	return $this->hasOne(LotRev::class);
    }
}
