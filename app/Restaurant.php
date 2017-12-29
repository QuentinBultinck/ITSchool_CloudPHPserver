<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, "owner_id");
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function reservations()
    {
        return $this->hasMany(Restaurant::class);
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

    public function getClosingTimeAttribute($closingTime)
    {
        return $this->formatTimeFromDB($closingTime);
    }

    public function getOpeningTimeAttribute($openingTime)
    {
        return $this->formatTimeFromDB($openingTime);
    }

    private function addNewTag($tag)
    {
        $createdTag = new Tag(["name" => $tag]);
        $createdTag->save();
        $createdTag->attachToRestaurant($this->id);
    }

    public function updateTags($tags)
    {
        //detach all current tags
        $this->tags()->detach();

        //attach all new tags
        foreach ($tags as $tag){
            $this->setTag($tag);
        }
    }

    private function setTag($tag)
    {
        $tagFromDB = Tag::where("name", $tag)->first();
        if (!empty($tagFromDB)) {
            $this->tags()->attach($tagFromDB->id);
        } else if (!empty($tag)) {
            $this->addNewTag($tag);
        }
    }

    public function setTags($tags)
    {
        foreach ($tags as $tag) {
            $this->setTag($tag);
        }
    }

    // These fields can be assigned11
    protected $fillable = ["name", "info", "cuisine", "openingTime", "tables", "closingTime", "city", "country", "street", "houseNumber", "owner_id"];

    // These fields can't be assigned
    protected $guarded = ["id"];
}
