<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Documents;
use App\Models\Bank;
use App\Models\BooksMark;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use App\Models\VendorWalletTransactions;


class BookingController
{
   
    public function offlineindex(Request $request,$status="")
    {

        if ($request->ajax()) {
          
            $data = Booking::where(function($query) use  ($status,$request) {
                            if(isset($request->searchByFromdate) && !empty($request->searchByFromdate) && isset($request->searchByTodate) && !empty($request->searchByTodate)) {
                                 $query->whereBetween('booking_date',[$request->searchByFromdate,$request->searchByTodate]);
                            }
                            
                            $query->where('status',$status);
            
                          
                        })->with('users')->latest()->orderBy('id','DESC')->get();
        
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a  href="'.route("booking-view", $row->id).'" class="edit btn btn-primary  ">View</a>';
                        
                        $btn.= '<a href="javascript:void(0)"  data-url="'.route("booking-status", $row->id).'" class="edit btn btn-primary updateButton ">Update</a>';
                        
                        return $btn;
                    })
                    ->addColumn('profile_image',function($row){

                        $profile = url($row->profile_image);
                        
                        if($row->profile_image)
                        {
                           return "<img src='$profile'  style='height:100px;width:100px;' />"; 
                        }
                        else{
                            return "<img src='/uploads/profile/default.png'  style='height:100px;width:100px;' />"; 
                        }

                    })

                    ->addColumn('status',function($row){

                        if($row->status){
                            return ($row->status)?'<span class="badge badge-primary">'.$row->status.'</span>':'<span class="badge  badge-primary">'.$row->status.'</span>';
                        }
                        else{
                            return '<span class="badge badge-danger">N/A</span>';
                        }

                      })
                    
                    ->editColumn('booking_date',function($row){
                        
                        return date('d M Y H:i A',strtotime($row->booking_date));
                                
                      })
                    ->rawColumns(['action','status','profile_image','doc_status','bank_status'])
                    ->make(true);
        }
        $data = array();

        $data['title'] = "List booking";
        $data['url'] = route('bookingoffline-list',$status);

        return view('admin.booking.booking',compact('data'));
    }

    public function bookingUpdate(Request $request,$booking_id){
        
        $validator = Validator::make($request->all(), [
            'transaction_id' => 'required',
        ]);

        if($validator->fails()){
		   return response()->json([
    			'status' => false,
	    		'errors' => $validator->errors()
			]);
		}
		
        $booking = Booking::find($booking_id);
       
        
        $totalAmt = $booking->total_amount;
        
         $booking->status = 'accepted';
        $booking->save();
        
         return response()->json([
    			'status' => true,
	    		'msg' =>'Transaction complete successfully'
			]);

        
        
         
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = array();
        $data['title'] = "Create Hostel Owner";
        $data['url'] = route('booking-save');

        return view('admin.booking.booking-create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'status'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = new Booking();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->mobile = $request->mobile;
        $post->longitude = $request->longitude;
        $post->latitude = $request->latitude;
        $post->password = bcrypt($request->password);
        $post->status = $request->status;
        if($request->hasFile('profile_image'))
        {
            $booking = 'booking_'.time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $booking);
            $booking = "/uploads/profile/".$booking;
            $post->profile_image = $booking;
        }
        $post->save();


        return response()->json([
            'status' => true,
            'msg' => 'Booking created successfully'
			]);

    }


    public function show($id){
        
        $booking = Booking::with('users','service_property')->find($id);
        
        $data['title'] = "View Booking";
        // echo "<pre>";print_r($booking);
        // exit;
        return view('admin.booking.booking-show',compact('booking','data'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $booking = Booking::get();
        $post = Booking::find($id);
        $booking = Booking::with('documents','bank')->find($id);
        $data['title'] = "Edit Hostel Owner";
        $data['url'] = route('Booking-update',$id);

        return view('admin.Booking.Booking-edit',compact('id','post','data','Booking','Booking'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

       $validator = Validator::make($request->all(), [
        'name' => 'required',
        'mobile' => 'required|numeric|digits:10|unique:users,mobile,'.$id,
        'email' => 'required|email|unique:users,email,'.$id,
        'status'=>'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = Booking::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->mobile = $request->mobile;
        $post->longitude = $request->longitude;
        $post->latitude = $request->latitude;
        $post->password = bcrypt($request->password);
        $post->status = $request->status;
        if($request->hasFile('profile_image'))
        {
            $user = 'booking_'.time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $user);
            $user = "/uploads/profile/".$user;
            $post->profile_image = $user;
        }
        $post->save();


        return response()->json([
            'status' => true,
            'msg' => 'Hostel Owner updated successfully'
			]);

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Booking::find($id)->delete();
        return response()->json([
            'status' => true,
            'msg' => 'Hostel Owner deleted successfully'
		]);
    }


}
