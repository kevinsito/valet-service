<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lot;
use App\Car;

define("SMALL", 0.1);
define("MED", 0.45);
define("LRG", 0.35);
define("SUPER", 0.1);

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

    public function getByIdToPost() {
    	$l_id = $_GET["lot_id"];
    	$lot = Lot::find($l_id);

    	if(!empty($lot)) {
		    return view('lot.put', compact('lot'));
		}
		else {
			return response()->json([
					'error' => ['message' => 'No lot found with specified Id'],
		            'status_code' => 400
		        ]);
		}
    }

    public function create() {
    	$req = request()->all();
    	$total_spots = $req['total_spots'];
    	
    	$lot = new Lot([
    		'total_spots' => $total_spots,
    		'rem_small' => floor($total_spots * SMALL),
    		'rem_med' => floor($total_spots * MED),
    		'rem_lrg' => floor($total_spots * LRG),
    		'rem_super' => floor($total_spots * SUPER),
    		'total_small' => 0,
    		'total_med' => 0,
    		'total_lrg' => 0,
    		'total_super' => 0,
    		'total' => 0,
    		]);
    	$lot->save();
    	
    	return redirect()->action('LotController@get');
    }

    public function delete() {
    	$l_id = $_GET["lot_id"];
    	$lot = Lot::find($l_id);

    	if($lot) {
    		$lot->delete();

    		return response()->json([
		            'message' => 'Success',
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

    public function update(Lot $lot) {
    	$req = request()->all();
    	$total_spots = $req['total_spots'];

    	$lot->update([
    		'total_spots' => $total_spots,
    		'rem_small' => floor($total_spots * SMALL),
    		'rem_med' => floor($total_spots * MED),
    		'rem_lrg' => floor($total_spots * LRG),
    		'rem_super' => floor($total_spots * SUPER),
    		'total_small' => $req['total_small'],
    		'total_med' => $req['total_med'],
    		'total_lrg' => $req['total_lrg'],
    		'total_super' => $req['total_super'],
    		'total' => $req['total'],
    		]);
    	
    	return redirect()->action('LotController@get');
    }

    public function enter() {
        $l_id = $_GET["lot_id"];
        $c_id = $_GET["car_id"];

        $lot = Lot::find($l_id);
        $car = Car::find($c_id);

        if(!empty($lot) && !empty($car)) {
            $size = $car->size;

            switch ($size) {
                case "small":
                    $remaining = $lot->rem_small;
                    break;
                case "medium":
                    $remaining = $lot->rem_med;
                    break;
                case "large":
                    $remaining = $lot->rem_lrg;
                    break;
                case "super":
                    $remaining = $lot->rem_super;
                    break;
                default:
                    $remaining = 0;
            }

            if($remaining > 0) {
                $car->location = "AA";
                $car->save();

                return response()->json([
                    'location' => $car->location,
                    'status_code' => 200
                ]);
            }
            else {
                return response()->json([
                    'message' => 'No more remaining spots! Please try another lot.',
                    'status_code' => 200
                ]);
            }
        }
        else {
            return response()->json([
                    'error' => ['message' => 'No lot or car found with specified Id'],
                    'status_code' => 400
                ]);
        }
    }
}
