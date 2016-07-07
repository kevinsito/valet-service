 @extends('layout')

 @section('content')
    <h1> PUT: /api/v1/user/{{ $user->id }} </h1>

    <form method="POST" action="/api/v1/pUser/{{ $user->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $user->name }}">
            <label for="lname">Last Name:</label>
            <input type="text" class="form-control" name="lname" id="lname" value="{{ $user->l_name }}">
            <label for="gender">Gender:</label>
            <input type="text" class="form-control" name="gender" id="gender" value="{{ $user->gender }}">
            <label for="age">Age:</label>
            <input type="text" class="form-control" name="age" id="age" value="{{ $user->age }}">
            <label for="times_parked">Times Parked:</label>
            <input type="text" class="form-control" name="times_parked" id="times_parked" value="{{ $user->times_parked }}">
            <label for="total_duration">Total Duration:</label>
            <input type="text" class="form-control" name="total_duration" id="total_duration" value="{{ $user->total_duration }}">
            <label for="avg_duration">Average Duration:</label>
            <input type="text" class="form-control" name="avg_duration" id="avg_duration" value="{{ $user->avg_duration }}">
            <label for="total_charged">Total Charged:</label>
            <input type="text" class="form-control" name="total_charged" id="total_charged" value="{{ $user->total_charged }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop