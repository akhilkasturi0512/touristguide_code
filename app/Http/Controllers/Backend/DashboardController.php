<?php
namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Business_cat;
use App\Models\Service_property;
use App\Models\Booking;
use App\Models\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
          $totalBusinesscat =  Business_cat::count();
          $totalproperty =  Service_property::count();
          $totalusers = User::count();
          $totalbooking = Booking::count();

         return view('admin.welcome',compact('totalbooking','totalBusinesscat','totalproperty','totalusers'));
    }
}
