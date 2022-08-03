<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;
use File;
use Auth;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type="")
    {

        if ($request->ajax()) {
            $post = $request->all();
            
            $data = Admin:: where(function($query) use ($request){
                        if($request->type=='Inactive'){
                            $query->where('deleted_status',0)->where('status',0);
                        }
                        elseif($request->type=='Trashed'){
                            $query->where('deleted_status',1);
                        }
                        else{
                            $query->where('deleted_status',0)->where('status',1);
                        }
                    })
                    ->with('roles')->latest()->get();
            foreach($data as $key=>$vals){
                if($vals->roles->count() > 0){
                    $roles = $vals->roles->pluck('name')->toArray();
                    $vals->roles_name = '<span class="badge badge-success">'.implode(',',$roles).'</span>';
                }
                else{
                    $vals->roles_name = '<span class="badge badge-default">N/A</span>';
                }
            }

            // prd($data);
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn = '';
                        if($row->deleted_status!='1'){
                            // if(Auth::guard('admin')->user()->can('Admin Edit')){
                            $btn = '<a href="'.route("admin-edit", $row->id).'" class="edit btn btn-primary   " style="margin-right: 15px;">Edit</a>';
                            //}
                            // if(Auth::guard('admin')->user()->can('Tasks Edit')){  
                            $btn.='<a  style="margin-right: 15px;" href="'.route("admin-view", $row->id).'" class="edit btn btn-primary  ">View</a>';
                            //}
                            // if(Auth::guard('admin')->user()->can('Tasks Edit')){
                            $btn.='<button  style="margin-right: 15px;" type="button" id="deleteButton" data-url="'.route('admin-delete', $row->id).'" class="edit btn btn-primary ml-2 btn-sm deleteButton" data-loading-text="Deleted...." data-rest-text="Delete">Delete</button>';
                            //}
                        }
                        else{
                            $btn.='<button  style="margin-right: 15px;" type="button" id="restoreButton" data-url="'.route('admin-restore', $row->id).'" class="edit btn btn-primary ml-2 btn-sm restoreButton" data-loading-text="Restore...." data-rest-text="Restore">Restore</button>';
                        }

                        return $btn;
                    })
                    ->addColumn('profile_image',function($row){
                        if(File::exists( public_path( $row->profile_image ) ) && $row->profile_image!=null){
                            $profile = url($row->profile_image);
                            return "<img src='$profile'  style='height:100px;width:100px;' />";
                        }
                        else{
                            return "N/A";
                        }

                    })
                    ->rawColumns(['action','profile_image','roles_name'])
                    ->make(true);
        }
        $data = array();
         $data['active'] = Admin::where('deleted_status',0)->where('status',1)->count();
         $data['inactive'] = Admin::where('deleted_status',0)->where('status',0)->count();
         $data['trashed'] = Admin::where('deleted_status',1)->count();

        $data['title'] = "List Admin";
        $data['url'] = route('admin-list',$type);

        return view('admin.admin-users.admin',compact('data','type'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = array();
        $data['title'] = "Create User";
        $data['url'] = route('admin-save');

        $roles = DB::table('roles')->get();
        
        return view('admin.admin-users.admin-create',compact('data','roles'));
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
            'mobile' => 'required|numeric|digits:10|unique:admins,mobile',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required',
            'status'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if ($validator->fails()){
            
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = new Admin();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->mobile = $request->mobile;
        $post->password =  Hash::make($request->password);
        $post->status = $request->status;
        if($request->hasFile('profile_image')){

            $user = 'user_'.time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $user);
            $user = "/uploads/profile/".$user;
            $post->profile_image = $user;
        }
        $post->save();

        $post->assignRole($request->roles);

        return response()->json([
            'status' => true,
            'msg' => 'User created successfully'
			]);

    }


    public function show($id){

        $user = Admin::find($id);
        $data = array();
        $data['title'] = "View User";
        return view('admin.admin-users.admin-show',compact('user','data'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Admin::find($id);
        $data['title'] = "Edit Admin User";
        $data['url'] = route('admin-update',$id);
        $roles = DB::table('roles')->get();
        
        $userRole = $post->roles->pluck('id')->all();
        // echo "<pre>";print_r($userRole);
        // exit;
        return view('admin.admin-users.admin-edit',compact('post','data','roles','userRole'));
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
            'name' => 'required',
            'mobile' => 'required|numeric|digits:10|unique:admins,mobile,'.$id,
            'email' => 'required|email|unique:admins,email,'.$id,
            'status'=>'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = Admin::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->mobile = $request->mobile;
        // $post->password =  Hash::make($request->password);
        $post->status = $request->status;
        if($request->hasFile('profile_image'))
        {
            $user = 'user_'.time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $user);
            $user = "/uploads/profile/".$user;
            $post->profile_image = $user;
        }
        $post->save();

        DB::table('model_has_roles')->where('model_id',$post->id)->delete();

        $post->assignRole($request->roles);

        return response()->json([
            'status' => true,
            'msg' => 'User updated successfully'
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
        // echo "hello";
        // exit;
        
        $data = Admin::find($id);
        $data->deleted_status = '1';
         $data->save();
        return response()->json([
            'status' => true,
            'msg' => 'User deleted successfully'
			]);
    }
    
      public function restore($id)
    {
        // echo "hello";
        // exit;
        
        $data = Admin::find($id);
        $data->deleted_status = '0';
         $data->save();
        return response()->json([
            'status' => true,
            'msg' => 'User restored successfully'
			]);
    }


    public function taskScheduler(Request $request){

        $authorizedRoles = ['Employee'];

        $users =    Admin::where('status',1)->whereHas('roles',function ($query) use ($authorizedRoles) {
                                return $query->whereIn('name', $authorizedRoles);
                            })->get();
        
        foreach($users as $key=>$vals){


        }


        sendWhatsUp();


    }


}
