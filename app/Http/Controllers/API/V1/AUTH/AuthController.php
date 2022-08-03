<?php
namespace App\Http\Controllers\API\V1\AUTH;
use App\Models\User;
use Validator;
use Auth;
use Hash;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class AuthController extends Controller
{
    public function __construct()
    {

    }
    
   
    public function Login(Request $request){
        $validator = Validator::make($request->all(), [
            'email_mobile' => 'required|string:exist:users,email',
        ]);

        if ($validator->fails()){
            
            $message = [];
            foreach($validator->errors()->getMessages() as $keys=>$vals){
               foreach($vals as $k=>$v){
                 $message[] =  $v;
               }
            }

            return response()->json([
                'status' => false,
                'message' => $message[0]
                ]);
        }


        $user = User::where(function($query) use($request){
            $query->where('email', $request->email_mobile);
        })
        ->first();

        if(! isset($user->id)){
            return response()->json(['status' => false,'message' => 'User not exist'], 200);
        }
        
       
        // if($user->status == 1)
        // {
             return response()->json(['status'=>true,'message'=>'Otp Sent Successfully']);
        // }
        // else{
        //     return response()->json(['status' => false,'message' => 'Your account is under verification'], 200);
        // }

   
    }


    public function Register(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'mobile' => 'required|numeric|unique:users',
            'email' => 'nullable|string|email|unique:users',
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

        $user = new User();
        $user->name = $request->name;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->verify_otp_status = 1;
        $user->register_otp = 1234;
        $user->save();
          
        return response()->json([
            'status' => true,
            'message' => 'Register Successfully',
        ]);





    }

    public function otpVerify(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'email' => 'required|string|exists:users',
            'otp' => 'required|numeric|digits:4',
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

        $exists = User::where('register_otp', $request->otp)->where('email', $request->email)->first();

        if($exists){
            
            
            User::where('email', $request->email)->update([
                'verify_otp_status' => 1,
            ]);
            
            $exists->device_key = $request->device_key;
            $exists->save();
            
            $users = auth()->guard('api')->login($exists);
            
            
            return $this->createNewToken($users);

        }
        
        return response()->json([
            'status' => false,
            'message' => 'Invalid Otp'
        ]);

    }


    public function logout() {
        auth()->guard('api')->logout();

        return response()->json(['status' => true,'message' => 'User successfully signed out']);
    }
  
  
    protected function createNewToken($token){
        return response()->json([
            'status' => true,
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->guard('api')->factory()->getTTL() * 60,
            'user' => auth()->guard('api')->user(),
            'message'=>'Login Successfully'
             
        ]);
    }
}
