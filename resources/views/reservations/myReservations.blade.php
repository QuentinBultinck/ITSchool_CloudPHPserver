@extends("layouts.app")

@section('pageTitle')
    My reservations
@endsection

@section('content')
    <h1>My reservations</h1>
    <ul class="list-group">
        @foreach($reservations as $reservation)
            <li class="list-group-item">
                <a href="/restaurants/{{ $reservation->restaurant->id }}">{{ $reservation->restaurant->name }}</a>
                <span>{{ $reservation->date }} @ {{ $reservation->time }} with {{ $reservation->people }} people</span>
            </li>
        @endforeach
    </ul>
@endsection