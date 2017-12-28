<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRestaurantRequest;
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
        $restaurant = Restaurant::where("owner_id", auth()->id())->first();
        if ($restaurant) {
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

        return redirect()->route("myRestaurant");
    }

    public function edit($id)
    {
        // GET pre filled form with values of his restaurant able to change
    }

    public function update(Request $request, $id)
    {
        // PATCH the changed restaurant
    }

    public function delete($id)
    {
        // DELETE restaurant
    }
}
