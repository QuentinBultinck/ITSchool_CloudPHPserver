@extends("layouts.app")

@section('pageTitle')
    My reservations
@endsection

@section('content')
    @if(empty($reservations[0]))
        <h1>You have not made any reservations</h1>
        <a class="btn btn-primary" href="{{ route("home") }}">Home  <i class="fa fa-home"></i></a>
    @else
        <h1>My reservations</h1>
        <ul class="list-group">
            @foreach($reservations as $reservation)
                <li class="list-group-item">
                    <a href="/restaurants/{{ $reservation->restaurant->id }}">{{ $reservation->restaurant->name }}</a>
                    <span>{{ $reservation->date }} @ {{ $reservation->time }} with {{ $reservation->people }}
                        people</span>
                </li>
            @endforeach
        </ul>
    @endif
@endsection