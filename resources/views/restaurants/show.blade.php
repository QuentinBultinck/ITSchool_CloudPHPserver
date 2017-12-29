@extends("layouts.app")

@section("pageTitle")
    {{ $restaurant->name }}
@endsection

@section("styleSheets")
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .ui-datepicker-calendar {
            z-index: 2000;
        }
    </style>
@endsection

@section("content")
    <div class="jumbotron bg-light">
        <h1 class="display-4">{{ $restaurant->name }}</h1>
        <p class="lead">{{ $restaurant->info }}</p>
        <hr class="my-4">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="container">
                        <div class="row">
                            <p class="col text-muted">Opening Time: {{ $restaurant->openingTime }} | Closing
                                Time: {{ $restaurant->closingTime }}</p>
                        </div>
                        <div class="row">
                            <div class="col">
                                <h2>Place reservation</h2>
                                <form action="{{ route("home") }}" method="post">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="form-group col-md-4">
                                            <label for="inputDate">Pick date</label>
                                            <input type="text" class="datePicker form-control" name="date" placeholder="Pick your date"
                                                   id="inputDate" value="{{ old("date") }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputTime">Time</label>
                                            <input type="time" class="form-control" name="time" id="inputTime"
                                                   value="{{ old("time") }}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputPeople">People</label>
                                            <input type="number" min="1" class="form-control" name="people"
                                                   id="inputPeople" value="{{ old('people') ? old("people") : 2 }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for="inputExtraInfo">Extra information</label>
                                            <textarea class="form-control" id="inputExtraInfo" rows="4"
                                                      placeholder="Birthday party"
                                                      name="extraInfo">{{ old('extraInfo') }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <img class="col-md-4 img-fluid img-thumbnail"
                     src="https://maps.googleapis.com/maps/api/staticmap?center={{ str_replace(" ", "+", $restaurant->city) }},{{ str_replace(" ", "+", $restaurant->country) }}
                             &zoom=12
                             &size=400x500
                             &markers=size:mid%7Ccolor:red%7C{{ str_replace(" ", "+", $restaurant->street) }}+{{ $restaurant->houseNumber }},{{ str_replace(" ", "+", $restaurant->city) }},{{ str_replace(" ", "+", $restaurant->country) }}
                             &key=AIzaSyAHvska680D4vnyHQCkOr5K1ZCseYO6K9E">
            </div>
        </div>
    </div>
@endsection

@section("scripts")
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="{{ asset("js/datepicker.js") }}"></script>
@endsection