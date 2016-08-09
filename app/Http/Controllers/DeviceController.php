<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use \UA;
use WhichBrowser\Parser;

class DeviceController extends Controller {

    function index() {
        
        $agent = new Parser($_SERVER['HTTP_USER_AGENT']);
        
        $data = array(
            'browser' => $agent->browser->toString(),
            'engine' => $agent->engine->toString(),
            'os' => $agent->os->toString(),
        );
        
        return response()->json($data, 200, [], JSON_PRETTY_PRINT);

    }

}
