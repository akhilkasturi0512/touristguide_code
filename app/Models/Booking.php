<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;



class Booking extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'bookings';

    public function users(){
        return $this->hasOne('App\Models\User','id','user_id');
    }
    
   
    public function service_property(){
        return $this->hasOne('App\Models\Service_property','id','service_property_id');
    }
    
}
