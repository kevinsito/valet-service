 @extends('layout')

 @section('content')
    <div class="container">
        <div class="content">
            <a class="title" href="/">Sito @ SoapBox</a>

            <h1> GET: /api/v1/car/{car_id} </h1>

            <form method="GET" action="/api/v1/car/car_id">
                <div class="form-group">
                    <label for="car_id">Car Id:</label>
                    <input type="text" class="form-control" name="car_id" id="car_id">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>

@stop