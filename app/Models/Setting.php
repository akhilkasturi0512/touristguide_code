<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
      * The attributes that are mass assignable.
      *
      * @var array
    */
	protected $table = 'setting_module';

    protected $fillable = ['id','site_url','site_name','commision','updated_at','updated_at','deleted_at', 'created_by','updated_by'];
    
}
