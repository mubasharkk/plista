<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Advertisement;

use App\Http\Requests;

class AdsController extends Controller
{
    
    
    function index($id){
        
        $ads = Advertisement::with('campaign')
                ->with('sponsor')
                ->where(array('id' => $id, 'status' => Advertisement::STATUS_ACTIVE))
                ->first();
        
        if (is_null($ads)) {
            $data = array(
                'status' => 'error',
                'message' => $id ? 'No result found!' : 'Invalid ID provided'
            );
        } else {

            $data['results'] = $ads->toArray();
            $data['status'] = 'success';
        }
        
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);        
    }
}
