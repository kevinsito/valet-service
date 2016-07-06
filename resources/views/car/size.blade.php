 @extends('layout')

 @section('content')
    <div class="container">
        <div class="content">
            <a class="title" href="/">Sito @ SoapBox</a>

            <h1> GET: /api/v1/cars/{size} </h1>

            <form method="GET" action="/api/v1/cars">
                <div class="form-group">
                    <label for="size">Size:</label>
                    <input type="text" class="form-control" name="size" id="size">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>

@stop