<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Service_property extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'service_property';

     public function property_images(){
        return $this->hasMany('App\Models\Service_property_images','service_property_id','id');
     }

     public function category(){
        return $this->hasOne('App\Models\Business_cat','id','cat_id');
     }

}
