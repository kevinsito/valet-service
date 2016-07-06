<?php

Route::get('/', function () {
    return view('welcome');
});

// ----- Users --------
Route::get('/api/v1/users', 'UserController@get');
Route::get('/api/v1/user', function () {
	return view('user.id');
});
Route::get('/api/v1/user/user_id', 'UserController@getById');

Route::get('/api/v1/lots', 'LotController@get');
Route::get('/api/v1/lot', function () {
	return view('lot.id');
});
Route::get('/api/v1/lot/lot_id', 'LotController@getById');

Route::get('/api/v1/car/{lot_id}', 'CarController@getByLotId');
Route::get('/api/v1/car/{user_id}', 'CarController@getByUserId');
Route::get('/api/v1/car/{size}', 'CarController@getBySize');