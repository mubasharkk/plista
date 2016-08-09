<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

use App\Advertisement;
use App\Advertiser;

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
     * Show advertisements by sponsor
     * 
     * @param int $sponsorId Sponsor/Advetiser 
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
            $data['status']  = 'success';
        }
        
        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
        
    }
    /**
     * Show advertisements by sponsor
     * 
     * @param int $id
     * @return Response
     */
    function showByCampaign($campaignId){
        
        $campaignId  = intval($campaignId);
        
        $ads = Advertisement::where(array('campaign_id' => $campaignId))
                        ->with('campaign')
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
    
    /**
     * Create a advertisement form 
     * 
     * @return Response
     */
    function create (){
        
        $advertisers = Advertiser::where(array('status' => Advertiser::STATUS_ACTIVE))
                ->orderBy('realname')
                ->get();

        $data['sponsors'] = $advertisers->toArray();   
        
        return view('ads-create', $data);
    }
    
    /**
     * Store Ad data to the database
     * 
     * @param Request $request
     * 
     * @return Response
     */
    function store(Request $request){
        
        // Validate fields
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',
            'image_url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'sponsored_by' => 'required',
            'campaign_id' => 'required',
        ]);
        
        if($validator->fails()){
            $data = [
                'message' => $validator->errors()->all(),
                'status' => 'error'
            ];
        } else {
            
            
            $ad = new Advertisement;
            
            $ad->title = $request->title;
            $ad->text = $request->text;
            $ad->image_url = $request->image_url;
            $ad->sponsored_by = $request->sponsored_by;
            $ad->campaign_id = $request->campaign_id;
            $ad->created_at = date('Y-m-d H:i:s');
            // save entity
            $ad->save();
            // update tracking url w.r.t ID
            $ad->tracking_url = action('AdsController@tracker', array($ad->id));
            $ad->updated_at = date('Y-m-d H:i:s');
            // save updated data
            $ad->save();
            
            $data = [
                'results' => [ 'id' => $ad->id ],
                'status' => 'success'
            ];            
            
            
        }
        
        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
        
    }  
    
    
    function update($AdId, Request $request){
                
        // Validate fields
        $validator = Validator::make($request->all(), [
            'title' => 'required|max:255',
            'text' => 'required',
            'image_url' => 'regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/',
            'sponsored_by' => 'required',
            'campaign_id' => 'required',
        ]);
        
        if($validator->fails()){
            $data = [
                'message' => $validator->errors()->all(),
                'status' => 'error'
            ];
        } else {

            // get the data from the AD
            $ad = Advertisement::find($AdId);
            
            $ad->title = $request->title;
            $ad->text = $request->text;
            $ad->image_url = $request->image_url;
            $ad->sponsored_by = $request->sponsored_by;
            $ad->campaign_id = $request->campaign_id;
            $ad->updated_at = date('Y-m-d H:i:s');
            // update data
            $ad->save();
            
            $data = [
                'results' => [ 'id' => $AdId ],
                'status' => 'success'
            ];            
        }
        
        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
        
    }  
    
   
    /**
     * Tracking Advertisement
     * 
     * @param int $trackId
     * @return type
     */
    function tracker($trackId){
        return $trackId;
    }
        
}
