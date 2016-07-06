 @extends('layout')

 @section('content')
    <div class="container">
        <div class="content">
            <a class="title" href="/">Sito @ SoapBox</a>

            <h1> Here are the API routes: </h1>
            <ul class="list-group">
                <div>
                    <h3> GET: </h3>
                    <a href="/api/v1/users" class="list-group-item"> /api/v1/users </a>
                    <a href="/api/v1/user/" class="list-group-item"> /api/v1/user/{user_id} </a>
                    <a href="/api/v1/lots" class="list-group-item"> /api/v1/lots/ </a>
                    <a href="/api/v1/lot/" class="list-group-item"> /api/v1/lot/{lot_id} </a>
                    <a href="/" class="list-group-item"> /api/v1/car/{lot_id} </a>
                    <a href="/" class="list-group-item"> /api/v1/car/{user_id} </a>
                    <a href="/" class="list-group-item"> /api/v1/car/{size} </a>
                </div>

                <div>
                    <h3> POST: </h3>
                </div>

                <div>
                    <h3> PUT: </h3>
                </div>

                <div>
                    <h3> DELETE: </h3>
                </div>
            </ul>
        </div>
    </div>

@stop