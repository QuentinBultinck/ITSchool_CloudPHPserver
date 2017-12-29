<?php

namespace App;

use Carbon\Carbon;
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

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
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

    private function addTables($quantity)
    {
        for ($i = 0; $i < $quantity; $i++) {
            Table::create([
                "restaurant_id" => $this->id
            ]);
        }
    }

    private function deleteTables($quantity)
    {
        $deletedRows = Table::where("restaurant_id", $this->id)->take($quantity)->delete();
        // Send email to all people that reserved this table
    }

    public function setTables($quantity)
    {
        $currentQuantityTables = Table::where("restaurant_id", $this->id)->count();
        if ($currentQuantityTables < $quantity) {
            $this->addTables($quantity - $currentQuantityTables);
        } else if ($currentQuantityTables > $quantity) {
            $this->deleteTables($currentQuantityTables - $quantity);
        }
    }

    private function addTag($tag)
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
            $tagFromDB->attachToRestaurant($this->id);
        } else if (!empty($tag)) {
            $this->addTag($tag);
        }
    }

    public function setTags($tags)
    {
        foreach ($tags as $tag) {
            $this->setTag($tag);
        }
    }

    // These fields can be assigned11
    protected $fillable = ["name", "info", "cuisine", "openingTime", "closingTime", "city", "country", "street", "houseNumber", "owner_id"];

    // These fields can't be assigned
    protected $guarded = ["id"];
}
