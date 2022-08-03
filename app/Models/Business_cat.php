<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Business_cat extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'business_category';
    protected $fillable = [
        'name'
    ];
}
