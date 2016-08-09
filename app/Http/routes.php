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

//Route::resource('advertisers', 'AdvertiserController',
//                ['only' => ['index']]);
//
//Route::resource('advertiser', 'AdvertiserController', 
//        ['except' => ['index']]);
//
//Route::resource('campaigns', 'CampaignController',
//                ['only' => ['index']]);

// Advertisers list 
Route::get('get/advertisers', 'AdvertiserController@index');
// Advertiser by id
Route::get('get/advertiser/{id}', 'AdvertiserController@show');
// Ads by Advertiser(Sponsor)
Route::get('get/advertiser/{id}/ads', 'AdsController@showBySponsor');
// Campaigns by Advertiser(Sponsor)
Route::get('get/advertiser/{id}/campaigns', 'CampaignController@showBySponsor');

// Campaigns list 
Route::get('get/campaigns', 'CampaignController@index');
// Campaign by id
Route::get('get/campaign/{id}', 'CampaignController@show');
// Ads by Campaign 
Route::get('get/campaign/{id}/ads', 'AdsController@showByCampaign');

// Ads by id
Route::get('get/ad/{id}', 'AdsController@index');

// Create and Update API Resources
Route::resource('ads', 'AdsController',
                ['except' => ['index','show']]);

Route::get('device/detect', 'DeviceController@index');

