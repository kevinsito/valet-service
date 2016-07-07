<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    protected $fillable = [
        'total_spots', 'rem_small', 'rem_med', 'rem_lrg', 'rem_super',
    	'total_small', 'total_med', 'total_lrg', 'total_super', 'total',
    ];

    public function cars() {
    	return $this->hasMany(Car::class);
    }

}
