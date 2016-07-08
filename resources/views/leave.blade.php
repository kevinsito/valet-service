 @extends('layout')

 @section('content')
    <h1> VALET: /api/v1/leave </h1>

    <form method="GET" action="/api/v1/leave/lot_id+loc">
        <div class="form-group">
            <label for="lot_id">Lot Id:</label>
            <input type="text" class="form-control" name="lot_id" id="lot_id">
            <label for="location">Location:</label>
            <input type="text" class="form-control" name="location" id="location">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop