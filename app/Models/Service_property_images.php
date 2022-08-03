<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service_property_images extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	protected $table = 'service_property_images';
    protected $fillable = ['service_property_id', 'image', 'image_key', 'created_at', 'updated_at'];

}
