<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    // These fields can be assigned11
    protected $fillable = ["name", "info", "cuisine", "openingTime", "closingTime", "city", "country", "street", "houseNumber", "owner_id"];

    // These fields can't be assigned
    protected $guarded = ["id"];
}
