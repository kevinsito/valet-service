 @extends('layout')

 @section('content')
    <h1> Here are the valet-service API routes: </h1>
    <ul class="list-group">
        <div>
            <h3> GET: </h3>
            <a href="/api/v1/users" class="list-group-item"> /api/v1/users </a>
            <a href="/api/v1/user/" class="list-group-item"> /api/v1/user/{user_id} </a>
            <a href="/api/v1/lots" class="list-group-item"> /api/v1/lots/ </a>
            <a href="/api/v1/lot/" class="list-group-item"> /api/v1/lot/{lot_id} </a>
            <a href="/api/v1/cars" class="list-group-item"> /api/v1/cars </a>
            <a href="/api/v1/car/" class="list-group-item"> /api/v1/car/{car_id} </a>
            <a href="/api/v1/cars/user" class="list-group-item"> /api/v1/cars/{user_id} </a>
            <a href="/api/v1/cars/lot" class="list-group-item"> /api/v1/cars/{lot_id} </a>
            <a href="/api/v1/cars/size" class="list-group-item"> /api/v1/cars/{size} </a>
        </div>

        <div>
            <h3> POST: </h3>
            <a href="/api/v1/postUser" class="list-group-item"> /api/v1/user/ </a>
            <a href="/api/v1/postLot" class="list-group-item"> /api/v1/lot/ </a>
            <a href="/api/v1/postCar" class="list-group-item"> /api/v1/car/ </a>
        </div>

        <div>
            <h3> PUT: </h3>
            <a href="/api/v1/pUser" class="list-group-item"> /api/v1/user/{user_id} </a>
            <a href="/api/v1/pLot" class="list-group-item"> /api/v1/lot/{lot_id} </a>
        </div>

        <div>
            <h3> DELETE: </h3>
            <a href="/api/v1/delUser" class="list-group-item"> /api/v1/user/{user_id} </a>
            <a href="/api/v1/delLot" class="list-group-item"> /api/v1/lot/{lot_id} </a>
            <a href="/api/v1/delCar" class="list-group-item"> /api/v1/car/{car_id} </a>
        </div>
    </ul>

@stop