 @extends('layout')

 @section('content')
    <h1> POST: /api/v1/lot </h1>

    <form method="POST" action="/api/v1/lot/all">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="total_spots">Total Spots:</label>
            <input type="text" class="form-control" name="total_spots" id="total_spots">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop