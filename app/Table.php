<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    // These fields can be assigned11
    protected $fillable = ["restaurant_id"];
}
