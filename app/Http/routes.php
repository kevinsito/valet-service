<?php

Route::get('/', function () {
    return view('welcome');
});

// ------- Users --------
Route::get('/api/v1/users', 'UserController@get');
Route::get('/api/v1/user', function () {
	return view('user.id');
});
Route::get('/api/v1/user/user_id', 'UserController@getById');

Route::get('/api/v1/postUser', function () {
	return view('user.create');
});
Route::post('/api/v1/user/all', 'UserController@create');

Route::get('/api/v1/pUser', function () {
	return view('user.getToPut');
});
Route::get('/api/v1/pUser/user_id', 'UserController@getByIdToPost');
Route::patch('/api/v1/pUser/{user}', 'UserController@update');

Route::get('/api/v1/delUser', function () {
	return view('user.delete');
});
Route::get('/api/v1/user/all', 'UserController@delete');

// ------- Lots --------
Route::get('/api/v1/lots', 'LotController@get');
Route::get('/api/v1/lot', function () {
	return view('lot.id');
});
Route::get('/api/v1/lot/lot_id', 'LotController@getById');

// ------- Cars --------
Route::get('/api/v1/car', function () {
	return view('car.id');
});
Route::get('/api/v1/car/car_id', 'CarController@getById');
Route::get('/api/v1/cars/user', function () {
	return view('car.uId');
});
Route::get('/api/v1/cars/user/user_id', 'CarController@getByUserId');
Route::get('/api/v1/cars/lot', function () {
	return view('car.lId');
});
Route::get('/api/v1/cars/lot/lot_id', 'CarController@getByLotId');
Route::get('/api/v1/cars/size', function () {
	return view('car.size');
});
Route::get('/api/v1/cars/', 'CarController@getBySize');