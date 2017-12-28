<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function reservedBy(){
        return $this->belongsTo(User::class);
    }

    public function table(){
        return $this->hasOne(Table::class);
    }
}
