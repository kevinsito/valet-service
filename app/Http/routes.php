<?php

Route::get('/', function () { return view('welcome'); });

// ------- Enter --------
Route::get('/api/v1/enter', function () { return view('enter'); });
Route::get('/api/v1/enter/lot_id+car_id', 'LotController@enter');
Route::get('/api/v1/leave', function () { return view('leave'); });
Route::get('/api/v1/leave/lot_id+loc', 'LotController@leave');

// ------- Users --------
Route::get('/api/v1/users', 'UserController@get');
Route::get('/api/v1/user', function () { return view('user.id'); });
Route::get('/api/v1/user/user_id', 'UserController@getById');

Route::get('/api/v1/postUser', function () { return view('user.create'); });
Route::post('/api/v1/user/all', 'UserController@create');

Route::get('/api/v1/pUser', function () { return view('user.getToPut'); });
Route::get('/api/v1/pUser/user_id', 'UserController@getByIdToPost');
Route::patch('/api/v1/pUser/{user}', 'UserController@update');

Route::get('/api/v1/delUser', function () { return view('user.delete'); });
Route::get('/api/v1/user/all', 'UserController@delete');

// ------- Lots --------
Route::get('/api/v1/lots', 'LotController@get');
Route::get('/api/v1/lot', function () { return view('lot.id'); });
Route::get('/api/v1/lot/lot_id', 'LotController@getById');

Route::get('/api/v1/postLot', function () { return view('lot.create'); });
Route::post('/api/v1/lot/all', 'LotController@create');

Route::get('/api/v1/pLot', function () { return view('lot.getToPut'); });
Route::get('/api/v1/pLot/lot_id', 'LotController@getByIdToPost');
Route::patch('/api/v1/pLot/{lot}', 'LotController@update');

Route::get('/api/v1/delLot', function () { return view('lot.delete'); });
Route::get('/api/v1/lot/all', 'LotController@delete');

// ------- Cars --------
Route::get('/api/v1/cars', 'CarController@get');
Route::get('/api/v1/car', function () { return view('car.id'); });
Route::get('/api/v1/car/car_id', 'CarController@getById');
Route::get('/api/v1/cars/user', function () { return view('car.uId'); });
Route::get('/api/v1/cars/user/user_id', 'CarController@getByUserId');
Route::get('/api/v1/cars/lot', function () { return view('car.lId'); });
Route::get('/api/v1/cars/lot/lot_id', 'CarController@getByLotId');
Route::get('/api/v1/cars/size', function () { return view('car.size'); });
Route::get('/api/v1/carsBySize/', 'CarController@getBySize');

Route::get('/api/v1/postCar', function () { return view('car.create'); });
Route::post('/api/v1/car/all', 'CarController@create');

Route::get('/api/v1/pCar', function () { return view('car.getToPut'); });
Route::get('/api/v1/pCar/car_id', 'CarController@getByIdToPost');
Route::patch('/api/v1/pCar/{car}', 'CarController@update');

Route::get('/api/v1/delCar', function () { return view('car.delete'); });
Route::get('/api/v1/car/all', 'CarController@delete');