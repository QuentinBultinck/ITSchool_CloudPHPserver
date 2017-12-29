@extends("layouts.app")

@section('pageTitle')
    Home
@endsection

@section('content')
    <h1>Make a reservation</h1>
    <div class="card-deck">
        @foreach($restaurants as $restaurant)
            <div class="card">
                {{--<img class="card-img-top" src="{{ asset("imgs/restaurants/" . $restaurant->name . ".jpg") }}" alt="{{ $restaurant->name }}">--}}
                <div class="card-header">
                    Some text for header
                </div>
                <div class="card-body">

                    <h2 class="card-title">{{ $restaurant->name }}</h2>
                    <p class="card-text">{{ $restaurant->info }}</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection