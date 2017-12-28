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

    // These fields can be assigned11
    protected $fillable = ["name", "info", "cuisine", "openingTime", "closingTime", "city", "country", "street", "houseNumber", "owner_id"];

    // These fields can't be assigned
    protected $guarded = ["id"];
}
