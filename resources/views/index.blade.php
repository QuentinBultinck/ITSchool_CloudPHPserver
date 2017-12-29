@extends("layouts.app")

@section('pageTitle')
    Home
@endsection

@section('content')
    <h1>Search a restaurant</h1>
    <form class="form-inline" action="{{route("search")}}" method="post">
        {{ csrf_field() }}
        <label class="sr-only" for="inputName">Name</label>
        <input type="text" class="form-control mr-2 my-1" id="inputName" placeholder="Name of restaurant" name="name">

        <label class="sr-only" for="inputCity">City</label>
        <input type="text" class="form-control mr-2 my-1" id="inputCity" placeholder="London, Bruges..." name="city">

        <label class="sr-only" for="inputTag">Tag</label>
        <input type="text" class="form-control mr-2 my-1" id="inputTag" placeholder="Steak, Chinese..." name="tag">

        <button type="submit" class="btn btn-primary my-1">Search</button>
    </form>

    <hr>

    <h2>Hot restaurants!</h2>
    <div class="card-deck">
        @foreach($restaurants as $restaurant)
            <div class="card bg-light">
                <div class="card-body">
                    <h2 class="card-title">{{ $restaurant->name }}</h2>
                    @foreach($restaurant->tags as $tag)
                        <span class="badge badge-info">{{ $tag->name }}</span>
                    @endforeach
                    <p class="card-text">{{ $restaurant->info }}</p>
                    <p class="card-text">{{ $restaurant->country }} - {{ $restaurant->city }}</p>
                    <p class="card-text">Opens {{ $restaurant->openingTime }} - Closes {{ $restaurant->closingTime }}</p>
                </div>
                <div class="card-footer">
                    <a href="/restaurants/{{$restaurant->id}}" class="btn btn-primary">Make reservation</a>
                </div>
            </div>
        @endforeach
    </div>
@endsection