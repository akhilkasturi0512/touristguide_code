<?php
namespace App\Http\Controllers\API\V1;
use App\Models\User;
use App\Models\Service_property;
use App\Models\Business_cat;
use App\Models\Booking;
use Validator;
use Auth;
use Hash;
use DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AppController extends Controller
{
    public function __construct()
    {

    }
    public function Category(Request $request){

        $category = Business_cat::select('id','name','image')->where('status', 1)->where('deleted_status', 0)->get();

        return response()->json([
            'status' => true,
            'data' =>$category
        ]);

    }
    
     public function Propertylisting(Request $request){

        $user = Auth()->user();
        $id = $user->id;
       
        $service_property = Service_property::leftjoin('states','states.id','=','service_property.state')
                                            ->leftjoin('cities','cities.id','=','service_property.city')
                                            ->select("service_property.*","states.name as state_name","cities.name as city_name")
                                            ->with('property_images','category')
                                            ->where('service_property.status', 1)
                                            ->where('service_property.deleted_status', 0)
                                           
                                          
                                            ->where(function($query) use ($request){
                                                
                                                if(isset($request->cat_id) && !empty($request->cat_id)){
                                                       $query->where('cat_id',$request->cat_id);
                                                }
                                            
                                                
                                            })
                                            ->get();
                                            
        return response()->json([
            'status' => true,
            'data' =>$service_property
        ]);

    }
    
    public function bookDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'book_id' => 'required|numeric|exists:books,id'
        ]);

        if($validator->fails()){
            return response()->json([
                'status' => false,
                'errors' => $validator->errors()
            ]);
        }

        $books = Books::where('id', $request->book_id)->first();
        return response()->json([
            'status' => true,
            'books' => $books
        ]);
    }

    
    
    public function Propertydetails(Request $request)
    {
       $user = Auth()->user();
        $id = $user->id;
	    $validator = Validator::make($request->all(),[
			'property_id' => 'required|exists:service_property,id',
        ]);

		if ($validator->fails())
		{
			$message = [];
			foreach($validator->errors()->getMessages() as $keys=>$vals)
			{
    			foreach($vals as $k=>$v)
    			{
    				$message[] =  $v;
    			}
			}

			return response()->json([
				'status' => false,
				'message' => $message[0]
				]);
		}

       
        
      
         
		$service_property = Service_property::with('property_images','category')
                                            ->leftjoin('states','states.id','=','service_property.state')
                                            ->leftjoin('cities','cities.id','=','service_property.city')
		                                    ->select("service_property.*","states.name as state_name","cities.name as city_name")
		                                    ->find($request->property_id);
        if($service_property)
        {
            return response()->json(['status' => true,'data'=>$service_property]);
        }
        else{
            return response()->json(['status' => false,'msg'=>'No data found']);
        }

    }
    
    
    public function savebooking(Request $request)
    {
        date_default_timezone_set("Asia/Kolkata");

        $validator = Validator::make($request->all(),[
            'property_id'=>'required',
        ]);

		if ($validator->fails())
		{
			$message = [];
			foreach($validator->errors()->getMessages() as $keys=>$vals)
			{
    			foreach($vals as $k=>$v)
    			{
    				$message[] =  $v;
    			}
			}

			return response()->json([
				'status' => false,
				'message' => $message[0]
				]);
		}

		$rand = rand(10000,100000);
		
		$booking = new Booking();
		$booking->user_id = auth()->guard('api')->user()->id;
		$booking->unique_id = $rand;
		$booking->property_id = $request->property_id;
		$booking->booking_date = $request->booking_date;
		$booking->description = $request->description;

		$property = Service_property::where('id',$request->property_id)->first();
		
		$booking->property_name = $property->business_name;
		$booking->total_amount = $property->price;
		$booking->status = 'Pending';
        $booking->created_at =date('Y-m-d H:i:s');
        $booking->updated_at = date('Y-m-d H:i:s');

		$booking->save();
		
		 return response()->json(['status'=>true,'data'=>$booking,'message'=>'Booking Saved Successfully']);

    }
    
    
    public function GetProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
        ]);

        if ($validator->fails()){

			$message = [];
			foreach($validator->errors()->getMessages() as $keys=>$vals)
			{
    			foreach($vals as $k=>$v)
    			{
    				$message[] =  $v;
    			}
			}

			return response()->json([
				'status' => false,
				'message' => $message[0]
				]);
		}
        
        $user = auth()->guard('api')->user()->id;
        $data = User::find(auth()->guard('api')->user()->id);
        return response()->json([
            'status' => true,
            'data' => $data
        ]);
    }
    
    
    public function UpdateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            
        ]);

         if ($validator->fails()){

			$message = [];
			foreach($validator->errors()->getMessages() as $keys=>$vals)
			{
    			foreach($vals as $k=>$v)
    			{
    				$message[] =  $v;
    			}
			}

			return response()->json([
				'status' => false,
				'message' => $message[0]
				]);
		}
        
        $user = auth()->guard('api')->user()->id;
        $data = User::find(auth()->guard('api')->user()->id);
        if($request->name)
        {
          $data->name = $request->name;  
        }
        if($request->mobile)
        {
            $data->mobile = $request->mobile;
        }
        if($request->email)
        {
            $data->email = $request->email;
        }
        if($request->hasFile('profile_pic'))
        {
            $profile_image = 'profile_'.time().'.'.$request->profile_pic->extension();
            $request->profile_pic->move(public_path('uploads/profile'), $profile_image);
            $profile_image = "uploads/profile/".$profile_image;
            $data->profile_image = $profile_image;
        }
        $pass = trim($request->password);
		$data->password = Hash::make($pass);
		$data->save();
		
		$userdata = User::find(auth()->guard('api')->user()->id);
        return response()->json([
            'status' => true,
            'message' => 'Profile Updated Successfully',
            'data' => $userdata
        ]);
    }
    
    
    public function Search(Request $request){

        $user = Auth()->user();
        $id = $user->id;
       
        $service_property = Service_property::leftjoin('states','states.id','=','service_property.state')
                                            ->leftjoin('cities','cities.id','=','service_property.city')
                                            ->select("service_property.*","states.name as state_name","cities.name as city_name")
                                            ->with('property_images','category')
                                            ->where('service_property.status', 1)
                                            ->where('service_property.deleted_status', 0)
                                           
                                          
                                            ->where(function($query) use ($request){
                                                
                                                if(isset($request->search) && !empty($request->search)){
                                                       $query->where('business_name','like', '%' . $request->search . '%');
                                                }
                                            })
                                            ->get();
                                            
        return response()->json([
            'status' => true,
            'data' =>$service_property
        ]);

    }

    
}