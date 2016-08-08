<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertiser extends Model
{
            
    /**
     * Table Name
     * @var string
     */
    protected $table = 'advertisers';
    
    
    /**
     * Advertiser real name
     * @var string
     */
    protected $realname;
    
   /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['created_at', 'updated_at'];    
    
    public function getName(){
        return $this->realname;
    }
    
    public function setName($name){
        $this->realname = $name;
    }

}
