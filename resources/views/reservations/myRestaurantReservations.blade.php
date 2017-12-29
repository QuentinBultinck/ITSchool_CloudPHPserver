@extends("layouts.app")

@section('pageTitle')
    My restaurant reservations
@endsection

@section('content')
    <h1>Reservations for {{ $reservations[0]->restaurant->name }}</h1>
    <ul class="list-group">
        @foreach($reservations as $reservation)
            <li class="list-group-item">
                <div>
                    <span>{{ $reservation->date }} @ {{ $reservation->time }} with {{ $reservation->people }}
                        people</span>
                </div>
                <div>
                    <span>Reserved
                        by {{ $reservation->reservedBy->name }} - {{ $reservation->reservedBy->email }}</span>
                </div>
            </li>
        @endforeach
    </ul>
@endsection