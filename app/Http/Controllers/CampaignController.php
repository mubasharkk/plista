<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Campaign;
use App\Http\Requests;

class CampaignController extends Controller
{
    function index(){
        
        $campaigns = Campaign::where(array('status' => Campaign::STATUS_ACTIVE))
                            ->get();
                            
        $data['results'] = $campaigns->toArray();
        $data['status'] = 'success';

        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);

    }
}
