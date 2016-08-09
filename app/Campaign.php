<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model {

    /**
     * Table name
     * @var string
     */
    protected $table = 'campaigns';

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * Row status 
     * @var boolean
     */
    protected $status;

    /**
     * Campaign Title
     * @var string
     */
    protected $title;

    /**
     * Advertiser
     * @var Advertiser
     */
    protected $advertiser;
    
   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
//    protected $hidden = ['created_at', 'updated_at'];    
    
    
    function advertiser() {
        return $this->belongsTo('App\Advertiser', 'advertiser_id');
    }
    
    function advertisement() {
        return $this->hasMany('App\Advertisement', 'campaign_id');
    }
    
}
