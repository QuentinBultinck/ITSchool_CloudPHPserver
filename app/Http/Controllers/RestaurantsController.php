<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RestaurantsController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::all();
        return view("restaurants.index")->with("restaurants", $restaurants);
    }

    public function myRestaurant()
    {
        $restaurant = Restaurant::where("owner_id", Auth::user()->id);
        if ($restaurant) {
            return view("restaurants.myRestaurant");
        } else {
            return view("restaurants.create");
        }
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            "name" => "required|unique:restaurants,name|string|max:50",
            "info" => "string|nullable|max:500",
            "cuisine" => "required|string|max:50",
            "openingTime" => "required|date_format:H:i",
            "closingTime" => "required|date_format:H:i",
            "city" => "required|string|max:100",
            "country" => "required|string|max:100",
            "street" => "required|string|max:100",
            "houseNumber" => "required|numeric",
//            "image" => "image"
        ]);

        Restaurant::create([
            "name" => request("name"),
            "info" => request("info"),
            "cuisine" => request("cuisine"),
            "openingTime" => request("openingTime"),
            "closingTime" => request("closingTime"),
            "city" => request("city"),
            "country" => request("country"),
            "street" => request("street"),
            "houseNumber" => request("houseNumber"),
            "owner_id" => Auth::user()->id
        ]);

        return redirect("restaurants/myRestaurant");
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
