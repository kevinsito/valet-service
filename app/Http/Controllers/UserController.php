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
}
