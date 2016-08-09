<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('advertisers', 'AdvertiserController',
                ['only' => ['index']]);

Route::resource('advertiser', 'AdvertiserController', 
        ['except' => ['index']]);

Route::resource('campaigns', 'CampaignController',
                ['only' => ['index']]);

Route::resource('campaign', 'CampaignController', 
        ['except' => ['index']]);

Route::get('get/ad/{id}', 'AdsController@index');

Route::get('device/detect', 'DeviceController@index');

