<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Car;
use App\Lot;
use App\User;

class CarController extends Controller
{
	public function get() {
    	$cars = Car::all();

	    return response()->json([
	            'cars' => $cars,
	            'status_code' => 200
	        ]);
    }

	public function getById() {
		$c_id = $_GET["car_id"];
		$car = Car::find($c_id);

		if(!empty($car)) {
		    return response()->json([
		            'car' => $car,
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No car found with specified Id'],
		            'status_code' => 400
		        ]);
		}
    }

    public function getByLotId() {
    	$l_id = $_GET["lot_id"];
		$lot = Lot::find($l_id);

		if($lot) {
			$cars = $lot->cars;
		}
		else {
			$cars = null;
		}

		if(!empty($cars)) {
		    return response()->json([
		            'cars' => $cars,
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No cars found with specified lot_id'],
		            'status_code' => 400
		        ]);
		}
    }

    public function getByUserId() {
    	$u_id = $_GET["user_id"];
		$user = User::find($u_id);

		if($user) {
			$cars = $user->cars;
		}
		else {
			$cars = null;
		}

		if(!empty($cars)) {
		    return response()->json([
		            'cars' => $cars,
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No cars found with specified user_id'],
		            'status_code' => 400
		        ]);
		}
    }

    public function getBySize() {
    	$size = $_GET["size"];
		$cars = Car::where('size', '=', $size)->get()->all();

		if(!empty($cars)) {
		    return response()->json([
		            'cars' => $cars,
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No car found with specified size'],
		            'status_code' => 400
		        ]);
		}
    }

    public function create() {
    	$req = request()->all();
    	
    	$car = new Car([
    		'user_id' => $req['user_id'],
    		'lot_id' => $req['lot_id'],
    		'size' => $req['size'],
    		'name' => $req['name'],
    		'colour' => $req['colour'],
    		'location' => $req['location'],
    		'duration' => 0,
    		'charge' => 0,
    		]);
    	$car->save();
    	
    	return redirect()->action('CarController@get');
    }

    public function delete() {
    	$c_id = $_GET["car_id"];
    	$car = Car::find($c_id);

    	if($car) {
    		$car->delete();

    		return response()->json([
		            'message' => 'Success',
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No car found with specified Id'],
		            'status_code' => 400
		        ]);
		}
    }
}
