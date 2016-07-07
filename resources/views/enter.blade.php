 @extends('layout')

 @section('content')
    <h1> VALET: /api/v1/enter </h1>

    <form method="GET" action="/api/v1/enter/lot_id+car_id">
        <div class="form-group">
            <label for="lot_id">Lot Id:</label>
            <input type="text" class="form-control" name="lot_id" id="lot_id">
            <label for="car_id">Car Id:</label>
            <input type="text" class="form-control" name="car_id" id="car_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop