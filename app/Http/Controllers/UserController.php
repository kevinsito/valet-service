<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    public function get() {
    	$users = User::all();

	    return response()->json([
	            'users' => $users,
	            'status_code' => 200
	        ]);
    }

    public function getById() {
    	$u_id = $_GET["user_id"];
    	$user = User::find($u_id);

    	if(!empty($user)) {
		    return response()->json([
		            'user' => $user,
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No user found with specified Id'],
		            'status_code' => 400
		        ]);
		}
    }

    public function getByIdToPost() {
    	$u_id = $_GET["user_id"];
    	$user = User::find($u_id);

    	if(!empty($user)) {
		    return view('user.put', compact('user'));
		}
		else {
			return response()->json([
					'error' => ['message' => 'No user found with specified Id'],
		            'status_code' => 400
		        ]);
		}
    }

    public function create() {
    	$req = request()->all();
    	
    	$user = new User([
    		'name' => $req['name'],
    		'l_name' => $req['lname'],
    		'gender' => $req['gender'],
    		'age' => $req['age'],
    		'times_parked' => 0,
    		'total_duration' => 0,
    		'avg_duration' => 0,
    		'total_charged' => 0
    		]);
    	$user->save();
    	
    	return redirect()->action('UserController@get');
    }

    public function delete() {
    	$u_id = $_GET["user_id"];
    	$user = User::find($u_id);

    	if($user) {
    		$user->delete();

    		return response()->json([
		            'message' => 'Success',
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No user found with specified Id'],
		            'status_code' => 400
		        ]);
		}
    }

    public function update(User $user) {
    	$req = request()->all();

    	$user->update([
    		'name' => $req['name'],
    		'l_name' => $req['lname'],
    		'gender' => $req['gender'],
    		'age' => $req['age'],
    		'times_parked' => $req['times_parked'],
    		'total_duration' => $req['total_duration'],
    		'avg_duration' => $req['avg_duration'],
    		'total_charged' => $req['total_charged']
    		]);
    	
    	return redirect()->action('UserController@get');
    }
}
