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
//        $tag = $request->tag;
        $restaurants = Restaurant::with("tags")
            ->where("name", "=", $request->name)
            ->orWhere("city", "=", $request->city)
//            ->whereHas("tags", function ($q) use ($tag) {
//                $q->where("name", "LIKE", "%" . $tag . "%")->with("tag");
//            })
            ->get();
        return view("index")->with("restaurants", $restaurants);
    }
}
