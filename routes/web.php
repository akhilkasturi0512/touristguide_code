<?php

use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::Routes();


// Login
Route::get('/', 'Auth\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'Auth\LoginController@login')->name('admin.post.login');



Route::get('/bookings', 'HomeController@bookings');


Route::any('/logout', 'Auth\LoginController@logout')->name('admin.logout');

Route::post('/send/forgot-password', 'Backend\SiteAuthController@sendForgotPassword')->name('send.password.email');

// Register
Route::get('/admin/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/admin/register', 'Auth\RegisterController@register')->name('register.store');


// Reset Password
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

Route::group(['middleware' => ['admin'],'namespace' => 'Backend'], function() {

    Route::get('/admin/dashboard', 'DashboardController@index')->name('admin.dashboard');
    
    Route::get('/setting', 'SettingController@index')->name('setting');
 Route::post('/setting/password/update', 'SettingController@updatePassword')->name('password-update');
 Route::post('/setting/email/update', 'SettingController@updateEmail')->name('email-update');

    //Business Category
    Route::group(['middleware' => ['permission:Business Master']],function() {
        Route::get('/admin/business_cat/create', 'Business_catController@create')->name('business_cat-create')->middleware(['permission:Business Create']);
        
        Route::post('/admin/business_cat/store', 'Business_catController@store')->name('business_cat-save')->middleware(['permission:Business Create']);
        Route::get('/admin/business_cat/edit/{id}', 'Business_catController@edit')->name('business_cat-edit')->middleware(['permission:Business Edit']);
        Route::get('/admin/business_cat/view/{id}', 'Business_catController@show')->name('business_cat-view')->middleware(['permission:Business View']);
        Route::post('/admin/business_cat/update/{id}', 'Business_catController@update')->name('business_cat-update')->middleware(['permission:Business Update']);
        Route::any('/admin/business_cat/destroy/{id}', 'Business_catController@destroy')->name('business_cat-delete')->middleware(['permission:Business Delete']);
        Route::any('/admin/business_cat/restore/{id}', 'Business_catController@restore')->name('business_cat-restore')->middleware(['permission:Business Delete']);
        Route::get('/admin/business_cat/{type?}', 'Business_catController@index')->name('business_cat-list')->middleware(['permission:Business List']);

    });
    
        //Setting Master
    Route::group(['middleware' => ['permission:Setting Master'] ],function() {

        Route::get('/admin/setting/create', 'SettingController@create')->name('setting-create')->middleware(['permission:Setting Create']);
        Route::get('/admin/setting', 'SettingController@index')->name('setting-list')->middleware(['permission:Setting List']);
        Route::post('/admin/setting/store', 'SettingController@store')->name('setting-save')->middleware(['permission:Setting Create']);
        Route::get('/admin/setting/edit/{id}', 'SettingController@edit')->name('setting-edit')->middleware(['permission:Setting Edit']);
        Route::get('/admin/setting/view/{id}', 'SettingController@show')->name('setting-view')->middleware(['permission:Setting View']);
        Route::post('/admin/setting/update/{id}', 'SettingController@update')->name('setting-update')->middleware(['permission:Setting Update']);
        Route::get('/admin/setting/destroy/{id}', 'SettingController@destroy')->name('setting-delete')->middleware(['permission:Setting Delete']);
        Route::post('/admin/setting/status/{id}', 'SettingController@statusSRM')->name('setting-status')->middleware(['permission:Setting Delete']);
        
    });
    
    
    //Booking Master
      Route::group(['middleware' => ['permission:Booking Master'] ],function() {

        Route::get('/admin/booking/{status?}', 'BookingController@index')->name('booking-list')->middleware(['permission:Booking List']);
        Route::get('/admin/booking/offline/{status?}', 'BookingController@offlineindex')->name('bookingoffline-list')->middleware(['permission:Booking List']);
        Route::get('/admin/booking/view/{id}', 'BookingController@show')->name('booking-view')->middleware(['permission:Booking View']);
        Route::any('/admin/booking/update/{id}', 'BookingController@update')->name('booking-update')->middleware(['permission:Booking Update']);
        Route::any('/admin/booking/destroy/{id}', 'BookingController@destroy')->name('booking-delete')->middleware(['permission:Booking Update']);

        Route::post('/admin/booking/status/update/{booking_id}', 'BookingController@bookingUpdate')->name('booking-status')->middleware(['permission:Booking View']);        
        
    });


    //Service Property Master
    Route::group(['middleware' => ['permission:User Create'] ],function() {

        Route::get('/admin/service_property/create', 'Service_propertyController@create')->name('service_property-create')->middleware(['permission:User Create']);
        Route::post('/admin/service_property/store', 'Service_propertyController@store')->name('service_property-save')->middleware(['permission:User Create']);
        Route::get('/admin/service_property/edit/{id}', 'Service_propertyController@edit')->name('service_property-edit')->middleware(['permission:User Create']);
        Route::get('/admin/service_property/view/{id}', 'Service_propertyController@show')->name('service_property-view')->middleware(['permission:User Create']);
        Route::post('/admin/service_property/update/{id}', 'Service_propertyController@update')->name('service_property-update')->middleware(['permission:User Create']);
        Route::post('/admin/service_property/delete/{id}', 'Service_propertyController@destroy')->name('service_property-delete')->middleware(['permission:User Create']);
        Route::post('/admin/service_property/restore/{id}', 'Service_propertyController@restore')->name('service_property-restore')->middleware(['permission:User Create']);
        Route::get('/admin/service_property/serviceable-areas', 'Service_propertyController@serviceableAreas')->name('serviceable-areas')->middleware(['permission:User Create']);
        
        Route::get('/admin/service_property/serviceable-location', 'Service_propertyController@serviceableLocation')->name('serviceable-location')->middleware(['permission:User Create']);
        
        Route::get('/admin/recently-viewed', 'Service_propertyController@recentlyViewed')->name('recently-viewed')->middleware(['permission:User Create']);
        
        
      Route::post('/admin/service_property/subscription/{id}', 'Service_propertyController@subscriptionUpdate')->name('subscription-update')->middleware(['permission:User Update']);
     
        Route::get('/admin/service_property/{type?}', 'Service_propertyController@index')->name('service_property-list')->middleware(['permission:User Create']);
    });


  
    
     //Admin Master
     Route::group(['middleware' => ['permission:Admin Master'] ],function() {

        Route::get('/admin/admin-users/create', 'AdminController@create')->name('admin-create')->middleware(['permission:Admin Create']);
        
        Route::post('/admin/admin-users/store', 'AdminController@store')->name('admin-save')->middleware(['permission:Admin Create']);
        Route::get('/admin/admin-users/edit/{id}', 'AdminController@edit')->name('admin-edit')->middleware(['permission:Admin Edit']);
        Route::get('/admin/admin-users/view/{id}', 'AdminController@show')->name('admin-view')->middleware(['permission:Admin View']);
        Route::post('/admin/admin-users/update/{id}', 'AdminController@update')->name('admin-update')->middleware(['permission:Admin Update']);
        Route::post('/admin/admin-users/destroy/{id}', 'AdminController@destroy')->name('admin-delete')->middleware(['permission:Admin Delete']);
         Route::post('/admin/admin-users/restore/{id}', 'AdminController@restore')->name('admin-restore')->middleware(['permission:Admin Delete']);
         Route::get('/admin/admin-users/{type?}', 'AdminController@index')->name('admin-list')->middleware(['permission:Admin List']);

    });


    //User Master
    Route::group(['middleware' => ['permission:User Master'] ],function() {

        Route::get('/admin/users/create', 'UserController@create')->name('user-create')->middleware(['permission:User Master']);
        
        Route::post('/admin/users/store', 'UserController@store')->name('user-save')->middleware(['permission:User Create']);
        Route::get('/admin/users/edit/{id}', 'UserController@edit')->name('user-edit')->middleware(['permission:User Edit']);
        Route::get('/admin/users/view/{id}', 'UserController@show')->name('user-view')->middleware(['permission:User View']);
        Route::post('/admin/users/update/{id}', 'UserController@update')->name('user-update')->middleware(['permission:User Update']);
        Route::post('/admin/users/destroy/{id}', 'UserController@destroy')->name('user-delete')->middleware(['permission:User Delete']);
        Route::post('/admin/users/bookmark/{bookmark_id}', 'UserController@bookmarkRemove')->name('bookmark.remove')->middleware(['permission:User Update']);
        Route::get('/admin/users/get-Cities', 'UserController@getCities')->name('get-Cities');
        Route::get('/admin/users/{type?}', 'UserController@index')->name('user-list')->middleware(['permission:User List']);

    });


    //Roles
    
    Route::get('/admin/role/create', 'RoleController@create')->name('role-create');
    Route::get('/admin/role', 'RoleController@index')->name('role-list');
    Route::post('/admin/role/store', 'RoleController@store')->name('role-save');
    Route::get('/admin/role/edit/{id}', 'RoleController@edit')->name('role-edit');
    Route::post('/admin/role/update/{id}', 'RoleController@update')->name('role-update');
    Route::post('/admin/role/destroy/{id}', 'RoleController@destroy')->name('role-delete');    
    
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
