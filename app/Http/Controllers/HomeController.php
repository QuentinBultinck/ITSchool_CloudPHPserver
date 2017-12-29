<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class HomeController extends Controller
{
    public function index()
    {
        $restaurants = Restaurant::with("tags")->get();
        return view("index")->with("restaurants", $restaurants);
    }

    public function searchRestaurants(Request $request)
    {
        $restaurants = Restaurant::with("tags")
            ->where("name", "LIKE", $request->name)
            ->orWhere("city", "LIKE", $request->city)
            ->get();
        dd($restaurants);
    }
}
