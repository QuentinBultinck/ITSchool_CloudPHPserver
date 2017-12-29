<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantRequest;
use App\Http\Requests\UpdateRestaurantRequest;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Table;

class RestaurantsController extends Controller
{
    public function __construct()
    {
        // All actions in this controller are only available when logged in,
        // not logged in => redirect to login login page
        $this->middleware("auth");
    }

    public function create()
    {
        $restaurant = Restaurant::where("owner_id", auth()->id())->with("tags")->first();
        if ($restaurant) {
            $restaurant->tables = Table::where("restaurant_id", $restaurant->id)->count();
            return view("restaurants.myRestaurant")->with("restaurant", $restaurant);
        } else {
            return view("restaurants.create");
        }
    }

    // Custom request checks validation
    public function store(CreateRestaurantRequest $request)
    {
        $restaurant = new Restaurant($request->all());
        $restaurant->owner_id = auth()->id();
        $restaurant->save();

        // Add tables
        $restaurant->setTables($request->tables);

        // Add tags
        $restaurant->setTags([$request->tag0, $request->tag1, $request->tag2, $request->tag3]);

        return redirect()->route("myRestaurant");
    }

    public function update(UpdateRestaurantRequest $request)
    {
        $restaurantToUpdate = Restaurant::where("owner_id", auth()->id())->first();
        $restaurantToUpdate->info = $request->info;
        $restaurantToUpdate->openingTime = $request->openingTime;
        $restaurantToUpdate->closingTime = $request->closingTime;
        $restaurantToUpdate->city = $request->city;
        $restaurantToUpdate->country= $request->country;
        $restaurantToUpdate->street = $request->street;
        $restaurantToUpdate->houseNumber = $request->houseNumber;

        // Set tables
        $restaurantToUpdate->setTables($request->tables);

        // Update tags
        $restaurantToUpdate->updateTags([$request->tag0, $request->tag1, $request->tag2, $request->tag3]);

        return redirect()->route("myRestaurant");
    }

    public function delete($id)
    {
        // DELETE restaurant
    }
}
