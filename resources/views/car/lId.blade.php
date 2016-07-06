 @extends('layout')

 @section('content')
    <div class="container">
        <div class="content">
            <a class="title" href="/">Sito @ SoapBox</a>

            <h1> GET: /api/v1/cars/{lot_id} </h1>

            <form method="GET" action="/api/v1/cars/lot/lot_id">
                <div class="form-group">
                    <label for="lot_id">Lot Id:</label>
                    <input type="text" class="form-control" name="lot_id" id="lot_id">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            
        </div>
    </div>

@stop