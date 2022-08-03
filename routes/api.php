<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'v1', 'namespace' => 'API\V1'], function(){
    
    Route::post('login', 'AUTH\AuthController@Login')->name('Api.Login');
    Route::post('register', 'AUTH\AuthController@Register')->name('Api.Register');
    Route::post('register/otp-verify', 'AUTH\AuthController@otpVerify')->name('Api.Register.Otp.Verify');

    Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function(){
        
        
        Route::post('category', 'AppController@Category');
        Route::post('property-list', 'AppController@Propertylisting');
        Route::post('property-detail', 'AppController@Propertydetails');
        Route::post('save-booking', 'AppController@SaveBooking');
        
        Route::post('get_profile', 'AppController@GetProfile');
        Route::post('update-profile', 'AppController@UpdateProfile');
        Route::post('search', 'AppController@Search');
        
    });

});




