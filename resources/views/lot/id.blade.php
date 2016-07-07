 @extends('layout')

 @section('content')
    <h1> GET: /api/v1/lot/{lot_id} </h1>

    <form method="GET" action="/api/v1/lot/lot_id">
        <div class="form-group">
            <label for="lot_id">Lot Id:</label>
            <input type="text" class="form-control" name="lot_id" id="lot_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop