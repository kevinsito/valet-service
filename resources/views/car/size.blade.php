 @extends('layout')

 @section('content')
    <h1> GET: /api/v1/cars/{size} </h1>

    <form method="GET" action="/api/v1/carsBySize/">
        <div class="form-group">
            <label for="size">Size:</label>
            <input type="text" class="form-control" name="size" id="size">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop