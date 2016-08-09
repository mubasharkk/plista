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
    
    /**
     * Show advertiser to the data
     * 
     * @param int $id
     * @return Response
     */
    function showBySponsor($sponsorId){
        
        $sponsorId  = intval($sponsorId);
        
        $ads = Advertisement::where(array('sponsored_by' => $sponsorId))
                        ->with('sponsor')
                        ->get();
                            
        if(is_null($ads)){
            $data = array(
                'status' => 'error',
                'message' => $sponsorId ? 'No result found!' : 'Invalid ID provided'
            );
        }else {
            
            $data['results']  = $ads->toArray();
//            $data['results']['campaigns'] = $advertiser->campaigns->count();
            $data['status']  = 'success';
        }
        
        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
        
    }
        
}
