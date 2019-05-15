<?php

namespace App\Http\Controllers;

use App\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActivitiesController extends Controller
{

    public function getActivities(Request $request){

        $numberOfPersons = $request->get('numberOfUsers') ? $request->get('numberOfUsers') : 1;

        $query = Activity::select(DB::raw("activities.*, price * $numberOfPersons as total_price"));
        if($request->get('date')){
            $query->where('start_at', '<', $request->get('date'))
                ->where('finish_at', '>', $request->get('date'));
        }

        return json_encode($query->orderBy('popularity')->get());

    }

}
