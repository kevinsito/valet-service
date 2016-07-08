<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Lot;
use App\Car;
use App\User;

define("SMALL", 0.1);
define("MED", 0.45);
define("LRG", 0.35);
define("SUPER", 0.1);

//$lotList = array();

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

        $spaceArr = array(['small', 'med', 'lrg', 'super]']);

        $spaces = array();
        for($i = 0; $i < $lot->rem_small; $i++) {
            $spaces[$i] = true;
        }
        $spaceArr['small'] = $spaces;

        $spaces = array();
        for($i = 0; $i < $lot->rem_med; $i++) {
            $spaces[$i] = true;
        }
        $spaceArr['med'] = $spaces;

        $spaces = array();
        for($i = 0; $i < $lot->rem_lrg; $i++) {
            $spaces[$i] = true;
        }
        $spaceArr['lrg'] = $spaces;

        $spaces = array();
        for($i = 0; $i < $lot->rem_super; $i++) {
            $spaces[$i] = true;
        }
        $spaceArr['super'] = $spaces;

        // $lotList[$lot->id] = $spaceArr;
    	
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
                    $lot->rem_small = $lot->rem_small - 1;
                    break;
                case "medium":
                    $remaining = $lot->rem_med;
                    $lot->rem_med = $lot->rem_med - 1;
                    break;
                case "large":
                    $remaining = $lot->rem_lrg;
                    $lot->rem_lrg = $lot->rem_lrg - 1;
                    break;
                case "super":
                    $remaining = $lot->rem_super;
                    $lot->rem_super = $lot->rem_super - 1;
                    break;
                default:
                    $remaining = 0;
            }

            if($remaining > 0) {
                $car->location = $this->freeLocation($lot->id, $car->size);
                $car->duration = 0;
                $car->charge = 0;
                $car->save();
                $lot->save();

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

    public function leave() {
        $l_id = $_GET["lot_id"];
        $loc = $_GET["location"];

        $car = Car::where(['lot_id' => $l_id, 'location' => $loc])->get()->all();
        $lot = Lot::find($l_id);

        if(!empty($car) && !empty($lot)) {
            $car = $car[0];

            $user = User::find($car->user_id);
            
            $duration = (time() - strtotime($car->updated_at))/60;
            $car->duration = round($duration);

            $charge = floor($duration/30) * 2;
            if(($duration%30) > 0) {
                $charge += 2;
            }

            if($charge > 15) {
                $charge = 15;
            }
            $car->charge = $charge;
            $car->location = "NA";

            $user->times_parked += 1;
            $user->total_duration += round($duration);
            $user->avg_duration = $user->total_duration / $user->times_parked;
            $user->total_charged += $charge;
            
            $size = $car->size;
            switch ($size) {
                case "small":
                    $lot->rem_small = $lot->rem_small + 1;
                    $lot->total_small = $lot->total_small + $charge;
                    break;
                case "medium":
                    $lot->rem_med = $lot->rem_med + 1;
                    $lot->total_med = $lot->total_med + $charge;
                    break;
                case "large":
                    $lot->rem_lrg = $lot->rem_lrg + 1;
                    $lot->total_lrg = $lot->total_lrg + $charge;
                    break;
                case "super":
                    $lot->rem_super = $lot->rem_super + 1;
                    $lot->total_super = $lot->total_super + $charge;
                    break;
                default:
                    return response()->json([
                        'error' => ['message' => 'No car found with specified size'],
                        'status_code' => 200
                    ]);
                    break;
            }

            $lot->total = $lot->total + $charge;

            $car->save();
            $user->save();
            $lot->save();

            return response()->json([
                    'message' => 'Thank you for using the Valet Service!',
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

    public function freeLocation($lId, $size) {
        $lot = Lot::find($lId);

        switch ($size) {
            case "small":
                $spot = rand(1, $lot->rem_small);
                $loc = "S" . $spot;
                break;
            case "medium":
                $spot = rand(1, $lot->rem_med);
                $loc = "M"  . $spot;
                break;
            case "large":
                $spot = rand(1, $lot->rem_lrg);
                $loc =  "L"  . $spot;
                break;
            case "super":
                $spot = rand(1, $lot->rem_super);
                $loc = "Su"  . $spot;
                break;
            default:
                $loc = "AA";
        }

        return $loc;
    }
}
