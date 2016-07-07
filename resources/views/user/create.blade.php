 @extends('layout')

 @section('content')
    <h1> POST: /api/v1/user </h1>

    <form method="POST" action="/api/v1/user/all">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" name="lname" id="lname">
            <label for="gender">Gender:</label>
            <input type="text" class="form-control" name="gender" id="gender">
            <label for="age">Age:</label>
            <input type="text" class="form-control" name="age" id="age">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop