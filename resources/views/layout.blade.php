<!DOCTYPE html>
<html>
    <head>
        <title>Valet Service</title>

        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">
        <link href="{{ elixir('css/app.css') }}" rel="stylesheet">

    </head>
    <body>
    	<div class="container">
	    	<div class="content">
		        <a class="title" href="/">Sito @ SoapBox</a>
		   		@yield('content')
			</div>
		</div>
    </body>
</html>
