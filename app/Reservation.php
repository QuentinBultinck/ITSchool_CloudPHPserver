<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function reservedBy(){
        return $this->belongsTo(User::class);
    }

    public function table(){
        return $this->belongTo(Table::class);
    }

    protected $fillable = ["guests", "durationHours", "table_id", "user_id"];
}
