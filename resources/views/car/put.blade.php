 @extends('layout')

 @section('content')
    <h1> PUT: /api/v1/car/{{ $car->id }} </h1>

    <form method="POST" action="/api/v1/pCar/{{ $car->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="user_id">User Id:</label>
            <input type="text" class="form-control" name="user_id" id="user_id" value="{{ $car->user_id }}">
            <label for="lot_id">Lot Id:</label>
            <input type="text" class="form-control" name="lot_id" id="lot_id" value="{{ $car->lot_id }}">
            <label for="size">Size:</label>
            <input type="text" class="form-control" name="size" id="size" value="{{ $car->size }}">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $car->name }}">
            <label for="colour">Colour:</label>
            <input type="text" class="form-control" name="colour" id="colour" value="{{ $car->colour }}">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location" value="{{ $car->location }}">
            <label for="duration">Duration:</label>
            <input type="text" class="form-control" name="duration" id="duration" value="{{ $car->duration }}">
            <label for="charge">Charge:</label>
            <input type="text" class="form-control" name="charge" id="charge" value="{{ $car->charge }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop