<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertiser;
use App\Http\Requests;

class AdvertiserController extends Controller {

    /**
     * Show all advertisers
     * 
     * @return Response
     */
    function index() {

        $advertisers = Advertiser::where(array('status' => Advertiser::STATUS_ACTIVE))
                            ->get();
                            
        $data['results'] = $advertisers->toArray();
        $data['status'] = 'success';

        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
    }
    
    /**
     * Show advertiser to the data
     * 
     * @param int $id
     * @return Response
     */
    function show($id){
        
        $id  = intval($id);
        
        $advertiser = Advertiser::where(array('id' => $id))
                            ->first();
                            
        if(is_null($advertiser)){
            $data = array(
                'status' => 'error',
                'message' => $id ? 'No result found!' : 'Invalid ID provided'
            );
        }else {
            
            $data['results']  = $advertiser->toArray();
            $data['results']['campaigns'] = $advertiser->campaigns->count();
            $data['status']  = 'success';
        }
        
        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
        
    }
    
    function create(){
        
    }

}
