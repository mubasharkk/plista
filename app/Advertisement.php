<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model {

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;

    /**
     * Row status 
     * @var boolean
     */
    protected $status;

    /**
     * Table Name
     * @var string
     */
    protected $table = 'advertisements';

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['updated_at'];
    
    
    function sponsor() {
        return $this->belongsTo('App\Advertiser', 'sponsored_by');
    }

    function campaign() {
        return $this->belongsTo('App\Campaign', 'campaign_id');
    }

}
