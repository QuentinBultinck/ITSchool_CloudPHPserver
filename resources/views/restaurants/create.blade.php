@extends("layouts.app")

@section('pageTitle')
    Add your restaurant
@endsection

@section('content')
    <!-- enctype="multipart/form-data" -->
    <form action="{{ route("restaurants.store") }}" method="post">
        {{ csrf_field() }}

        @include("partials.formErrors")

        <div class="row">
            <div class="form-group col-md-12">
                <label for="inputName">Name</label>
                <input type="text" class="form-control" id="inputName" required name="name" value="{{ old['name'] }}">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-12">
                <label for="inputInfo">Info</label>
                <textarea class="form-control" id="inputInfo" rows="4" name="info" value="{{ old['info'] }}"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputCuisine">Cuisine</label>
                <input type="text" class="form-control" id="inputCuisine" value="{{ old['cuisine'] }}" required placeholder="Fast-food, Chinese..."
                       name="cuisine">
            </div>
            <div class="form-group col-md-3">
                <label for="inputOpeningTime">Opening Time</label>
                <input type="time" class="form-control" id="inputCuisine" required name="openingTime" value="{{ old['openingTime'] }}">
            </div>
            <div class="form-group col-md-3">
                <label for="inputClosingTime">Closing Time</label>
                <input type="time" class="form-control" id="inputClosingTime" value="{{ old['closingTime'] }}" required name="closingTime">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-8">
                <label for="inputAddressStreet">Street</label>
                <input type="text" class="form-control" id="inputAddressStreet" value="{{ old['street'] }}" required name="street">
            </div>
            <div class="form-group col-md-4">
                <label for="inputHouseNumber">Number</label>
                <input type="text" class="form-control" id="inputHouseNumber" value="{{ old['houseNumber'] }}" required name="houseNumber">
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity" value="{{ old['city'] }}" required name="city">
            </div>
            <div class="form-group col-md-6">
                <label for="inputCountry">Country</label>
                <input type="text" class="form-control" id="inputCountry" value="{{ old['country'] }}" required name="country">
            </div>
        </div>
        <!--
        <div class="row">
            <div class="form-group col-md-12">
                <label for="inputImage">Upload your image</label>
                <input type="file" class="btn btn-info" id="inputImage" name="image">
            </div>
        </div>
        -->
        <div class="row">
            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>

@endsection