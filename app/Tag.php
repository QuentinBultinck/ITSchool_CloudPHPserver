<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    public function restaurants()
    {
        return $this->belongsToMany(Restaurant::class);
    }

    public function attachToRestaurant($restaurantId)
    {
        $this->restaurants()->attach($restaurantId);
    }

    protected $fillable = ["name"];
}
