<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function bookings(Request $request)
    {
        
        $bookings = DB::table('bookings')->whereDate('booking_date','<',date('Y-m-d'))->where('status','pending')->update(['status'=>'rejected']);
       
        echo "Bookings Updated successfully";  
    }
}
