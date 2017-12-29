<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateReservationRequest;
use App\Reservation;
use App\Restaurant;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function __construct()
    {
        // All actions in this controller are only available when logged in,
        // not logged in => redirect to login login page
        $this->middleware("auth");
    }

    public function create(CreateReservationRequest $request)
    {
        $createdReservation = new Reservation($request->all());
        $countReservations = Reservation::where([
            ["date", "=", $createdReservation->date],
            ["restaurant_id", "=", $createdReservation->restaurant_id]
        ])->count();
        $restaurant = Restaurant::where("id", "=", $createdReservation->restaurant_id)->first();
        if ($countReservations < $restaurant->tables) {
            $createdReservation->user_id = auth()->id();
            $createdReservation->save();
            return redirect()->route("myReservations");
        } else {
            return redirect()->route("showRestaurant", ["restaurant" => $createdReservation->restaurant_id])->withErrors(["Sorry " . $restaurant->name . " is fully booked on " . $createdReservation->date]);
        }
    }

    public function myReservations()
    {
        $reservations = Reservation::with("restaurant")->where("user_id", auth()->id())->get();
        return view("reservations.myReservations")->with("reservations", $reservations);
    }

    public function myRestaurantReservations()
    {
        $restaurant = Restaurant::where("owner_id", auth()->id())->first();
        if (empty($restaurant)) {
            return redirect()->route("myRestaurant")->withErrors(["You have no restaurant"]);
        } else {
            $reservations = Reservation::with("reservedBy")->where("restaurant_id", $restaurant->id)->get();
            return view("reservations.myRestaurantReservations")->with("reservations", $reservations);
        }
    }

    public function delete(Reservation $reservation)
    {
        if (auth()->id() == $reservation->restaurant->owner_id) {
            $reservation->delete();
            return redirect()->route("myRestaurantReservations");
        } else {
            return redirect()->route("home");
        }
    }
}
