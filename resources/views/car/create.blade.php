 @extends('layout')

 @section('content')
    <h1> POST: /api/v1/car </h1>

    <form method="POST" action="/api/v1/car/all">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="user_id">User Id:</label>
            <input type="text" class="form-control" name="user_id" id="user_id">
            <label for="lot_id">Lot Id:</label>
            <input type="text" class="form-control" name="lot_id" id="lot_id">
            <label for="size">Size:</label>
            <input type="text" class="form-control" name="size" id="size">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name">
            <label for="colour">Colour:</label>
            <input type="text" class="form-control" name="colour" id="colour">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop