<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertiser;
use App\Http\Requests;

class AdvertiserController extends Controller {

    /**
     * @return Response
     */
    function index() {

        $advertisers = Advertiser::all();

        $data = $advertisers->toArray();

        return response()->json($data, 200 , [], JSON_PRETTY_PRINT);
    }

}
