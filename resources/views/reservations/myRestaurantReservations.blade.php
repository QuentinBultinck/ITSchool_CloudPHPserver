@extends("layouts.app")

@section('pageTitle')
    My restaurant reservations
@endsection

@section('content')
    @if(empty($reservations[0]))
        <h1>No reservations yet :(</h1>
    @else
        <h1>Reservations for {{ $reservations[0]->restaurant->name }}</h1>
        <ul class="list-group">
            @foreach($reservations as $reservation)
                <li class="list-group-item">
                    <div class="container">
                        <div class="row">
                            <div class="col-11">
                                <div>
                    <span>{{ $reservation->date }} @ {{ $reservation->time }} with {{ $reservation->people }}
                        people</span>
                                </div>
                                <div>
                    <span>Reserved
                        by {{ $reservation->reservedBy->name }} - {{ $reservation->reservedBy->email }}</span>
                                </div>
                            </div>
                            <div class="col-1">
                                <form action="{{ route('deleteReservation', $reservation->id) }}" method="post">
                                    {{ csrf_field() }}
                                    {{ method_field("DELETE") }}
                                    <input type="hidden" value="{{ $reservation->id }}">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-2x fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>


                </li>
            @endforeach
        </ul>
    @endif
@endsection