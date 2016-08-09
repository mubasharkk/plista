<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Campaign;
use App\Http\Requests;

class CampaignController extends Controller {

    /**
     * Show all campaigns
     * @return Response
     */
    function index() {

        $campaigns = Campaign::with('advertiser')->where(array('status' => Campaign::STATUS_ACTIVE))
                ->get(array('id','title','created_at', 'advertiser_id'));

        $data['results'] = $campaigns->toArray();
        $data['status'] = 'success';

        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Show advertiser to the data
     * 
     * @param int $id
     * @return Response
     */
    function show($id) {

        $id = intval($id);

        $campaign = Campaign::with('advertiser')
                ->where(array('id' => $id))
                ->first(array('id', 'title', 'created_at', 'advertiser_id'));

        if (is_null($campaign)) {
            $data = array(
                'status' => 'error',
                'message' => $id ? 'No result found!' : 'Invalid ID provided'
            );
        } else {

            $data['results'] = $campaign->toArray();
            $data['results']['ads_count'] = $campaign->advertisement->count();
            $data['status'] = 'success';
        }

        return response()->json($data, 200, [], JSON_PRETTY_PRINT);
    }
    
    /**
     * Show campaigns by sponsor
     * 
     * @param int $sponsorId Sponsor/Advetiser 
     * @return Response
     */
    function showBySponsor($sponsorId){
        
        $sponsorId  = intval($sponsorId);
        
        $ads = Campaign::where(array('advertiser_id' => $sponsorId, 'status' => Campaign::STATUS_ACTIVE))
                        ->with('advertiser')
                        ->get();
                            
        if(is_null($ads)){
            $data = array(
                'status' => 'error',
                'message' => $sponsorId ? 'No result found!' : 'Invalid ID provided'
            );
        }else {
            
            $data['results']  = $ads->toArray();
            $data['status']  = 'success';
        }
        
        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
        
    }    

}
