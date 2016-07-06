<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lot;

class LotController extends Controller
{
    public function get() {
    	$lots = Lot::all();

	    return response()->json([
	            'lots' => $lots,
	            'status_code' => 200
	        ]);
    }

	public function getById() {
		$l_id = $_GET["lot_id"];
		$lot = Lot::find($l_id);

		if(!empty($lot)) {
		    return response()->json([
		            'lot' => $lot,
		            'status_code' => 200
		        ]);
		}
		else {
			return response()->json([
					'error' => ['message' => 'No lot found with specified Id'],
		            'status_code' => 400
		        ]);
		}
    }
}
