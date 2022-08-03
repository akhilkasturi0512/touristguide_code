<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use DB;
use App\Models\Setting;
use Hash;
use DataTables;
use Validator;
use Auth;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

      
        return view('admin.setting.setting');
    }

    public function updatePassword(Request $request){
        $validator = Validator::make($request->all(), [
            'old_password' =>  [
                'required', function ($attribute, $value, $fail) {
                    if (!Hash::check($value, Auth::user()->password)) {
                        $fail('Old Password didn\'t match');
                    }
                },
            ],
            'password' => 'required|min:6',
            'confirm_password' => 'required_with:password|same:password|min:6',
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }
        
        $user = Admin::find(Auth::user()->id);
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            'status' => true,
            'msg' => 'User Password updated successfully'
			]);


    }
    public function updateEmail(Request $request){
        // print_r($request->all());exit;
        $id = Auth::user()->id ; 
        $validator = Validator::make($request->all(), [
           
            'email' => 'required|email|unique:admins,email,'.$id,
           
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
        }
        
        $user = Admin::find(Auth::user()->id);
        
        $user->email = $request->email;
        
         if($request->hasFile('image'))
        {
            $user_img = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/adminuserimage'), $user_img);
            $user_img = "/uploads/adminuserimage/".$user_img;
         
            $user->profile_image = $user_img;
        }
        
        
        
        $user->save();
        
        // return redirect()->route('admin.logout')->with('success','Redirect login page.');

        return response()->json([
            'status' => true,
            'msg' => 'User Detail Update successfully'
			]);


    }

    public function create()
    {
        $data = array();
        $data['title'] = "Create Setting";
        $data['url'] = route('setting-save');
        return view('admin.setting.setting-create',compact('data'));
    }
    
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            // 'other_problem' => 'required',
        ]);

        if ($validator->fails()){

		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}

        $data = $request->except('_token');
        $data['created_by'] = Auth::guard('admin')->user()->id;
        $data['created_at'] = date('Y-m-d H:i:s');

        $setting = Setting::create($data);
        
        return response()->json([
            'status' => true,
            'msg' => 'Settings created successfully'
			]);

    }


    public function UploadDoc($destinationPath, $field, $newName = ''){
        $destinationPath = $destinationPath;
        $extension = $field->getClientOriginalExtension();
        $fileName = Str::slug($newName, '-') . '-' . time() . '-' . rand(1, 999) . '.' . $extension;
        $field->move($destinationPath, $fileName);
        return $fileName;
    }

    public function show(Request $request,$id){
        $setting = Setting::find($id);
        $data = array();
        $data['title'] = "View Setting";
        return view('admin.setting.setting-show',compact('setting','data'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id){
        $setting = Setting::find($id);
        $data['title'] = "Edit Setting";
        $data['url'] = route('setting-update',$id);
        return view('admin.setting.setting-edit',compact('setting','data'));
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){

         $validator = Validator::make($request->all(), [
            'commision' => 'required|numeric|min:1',
            //  'billing_time' => 'required|numeric|min:1',
            //   'dispatch_time' => 'required|numeric|min:1',
            //   'gr_time' => 'required|numeric|min:1',
        ]);

        if ($validator->fails()){

		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}
        $data = $request->except('_token');
        $data['updated_by'] = Auth::guard('admin')->user()->id;
        $data['updated_at'] = date('Y-m-d H:i:s');
        
        // if($request->hasFile('site_logo')){
        //      $site_logo = $this->UploadDoc('uploads/site_logo', $request->file('site_logo'), $newName = '');
        //      $data['site_logo'] = '/uploads/site_logo/'.$site_logo;
        // }

        $setting = Setting::where('id',$id)->update($data);
         
        return response()->json([
            'status' => true,
            'msg' => 'Settings updated successfully'
			]);

    }

}