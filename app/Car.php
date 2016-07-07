<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = [
        'user_id', 'lot_id', 'size', 'name', 'colour', 'location', 'duration', 'charge',
    ];

    public function lot() {
    	return $this->belongsTo(Lot::class);
    }

    public function user() {
    	return $this->belongsTo(User::class);
    }
}
