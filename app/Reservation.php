<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    public function reservedBy()
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class, "restaurant_id");
    }

    private function formatTimeFromDB($time)
    {
        $formatedTime = new Carbon($time);
        $minutes = $formatedTime->minute;
        if ($minutes < 10) {
            $minutes .= 0;
        }
        return $formatedTime->hour . ":" . $minutes;
    }

    public function getTimeAttribute($time)
    {
        return $this->formatTimeFromDB($time);
    }

    protected $fillable = ["people", "date", "time", "extraInfo", "restaurant_id", "user_id"];
}
