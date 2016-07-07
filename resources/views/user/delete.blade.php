 @extends('layout')

 @section('content')
    <h1> DELETE: /api/v1/user/{user_id} </h1>

    <form method="GET" action="/api/v1/user/all">
        <div class="form-group">
            <label for="user_id">User Id:</label>
            <input type="text" class="form-control" name="user_id" id="user_id">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop