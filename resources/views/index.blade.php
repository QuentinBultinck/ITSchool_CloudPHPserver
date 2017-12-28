@extends("layouts.app")

@section('pageTitle')
    Home
@endsection

@section('content')
    <h1>Restaurants</h1>
    <div class="card-deck">
        @foreach($restaurants as $restaurant)
            <div class="card">
                {{--<img class="card-img-top" src="{{ asset("imgs/restaurants/" . $restaurant->name . ".jpg") }}" alt="{{ $restaurant->name }}">--}}
                <div class="card-header">
                    <h2>{{ $restaurant->name }}</h2>
                </div>
                <div class="card-body">
                    <p>{{ $restaurant->info }}</p>
                </div>
            </div>
        @endforeach
    </div>
@endsection