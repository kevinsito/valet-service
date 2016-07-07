 @extends('layout')

 @section('content')
    <h1> PUT: /api/v1/lot/{{ $lot->id }} </h1>

    <form method="POST" action="/api/v1/pLot/{{ $lot->id }}">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}

        <div class="form-group">
            <label for="total_spots">Total Spots:</label>
            <input type="text" class="form-control" name="total_spots" id="total_spots" value="{{ $lot->total_spots }}">
            <label for="total_small">Revenue Small:</label>
            <input type="text" class="form-control" name="total_small" id="total_small" value="{{ $lot->total_small }}">
            <label for="total_med">Revenue Medium:</label>
            <input type="text" class="form-control" name="total_med" id="total_med" value="{{ $lot->total_med }}">
            <label for="total_lrg">Revenue Large:</label>
            <input type="text" class="form-control" name="total_lrg" id="total_lrg" value="{{ $lot->total_lrg }}">
            <label for="total_super">Revenue Super:</label>
            <input type="text" class="form-control" name="total_super" id="total_super" value="{{ $lot->total_super }}">
            <label for="total">Total Revenue:</label>
            <input type="text" class="form-control" name="total" id="total" value="{{ $lot->total }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>

@stop