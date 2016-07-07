 @extends('layout')

 @section('content')
    <h1> DELETE: /api/v1/car/{car_id} </h1>

    <form method="GET" action="/api/v1/car/all">
        <div class="form-group">
            <label for="car_id">Car Id:</label>
            <input type="text" class="form-control" name="car_id" id="car_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop