<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\BooksMark;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Str;
use DB;
use Hash;
use DataTables;
use Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
    
    
    public function index(Request $request,$type="")
    {

        if ($request->ajax()) {
            $data = User:: where(function($query) use ($request){
                        if($request->type=='Inactive'){
                            $query->where('deleted_status',0)->where('status',0);
                        }
                        elseif($request->type=='Trashed'){
                            $query->where('deleted_status',1);
                        }
                        else{
                            $query->where('deleted_status',0)->where('status',1);
                        }
                    })->latest()->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '<a href="'.route("user-edit", $row->id).'" class="edit btn btn-primary   " style="margin-right: 15px;">Edit</a><a  style="margin-right: 15px;" href="'.route("user-view", $row->id).'" class="edit btn btn-primary  ">View</a>
                        <button  style="margin-right: 15px;" type="button" id="deleteButton" data-url="'.route('user-delete', $row->id).'" class="edit btn btn-primary ml-2 btn-sm deleteButton" data-loading-text="Deleted...." data-rest-text="Delete">Delete</button>';

                        return $btn;
                    })
                    ->addColumn('profile_image',function($row){

                        $profile = url($row->profile_image);

                        return "<img src='$profile'  style='height:100px;width:100px;' />";

                    })
                    ->rawColumns(['action','profile_image'])
                    ->make(true);
        }
        $data = array();

         $data['active'] = User::where('deleted_status',0)->where('status',1)->count();
         $data['inactive'] = User::where('deleted_status',0)->where('status',0)->count();
         $data['trashed'] = User::where('deleted_status',1)->count();
         
        $data['title'] = "List User";
        $data['url'] = route('user-list',$type);

        return view('admin.users.user',compact('data','type'));
    }
    
    public function getCities(Request $request){
        
        $city= DB::table('cities')->select('id','name')->where(['state_id'=>$request->state_id])->get();
        
        return response()->json(['status'=>true,'data'=>$city]);
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
        $data['url'] = route('user-save');
        $state = DB::table('states')->orderby('name','asc')->where('country_id','231')->get();


        return view('admin.users.user-create',compact('data','state'));
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
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = new User();
        $post->name = $request->name;
        $post->email = $request->email;
        $post->mobile = $request->mobile;
        $post->city = $request->city_id;
        $post->state = $request->state_id;
        $post->password = bcrypt($request->password);
        $post->status = $request->status;
        $post->referal_id = Str::random(40);
        if($request->hasFile('profile_image'))
        {
            $user = 'user_'.time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $user);
            $user = "/uploads/profile/".$user;
            $post->profile_image = $user;
        }
        $post->save();


        return response()->json([
            'status' => true,
            'msg' => 'User created successfully'
			]);

    }

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(1, $charactersLength - 5)];
        }
        return $randomString;
    }

 public function show($id)
    {
        $user = User::find($id);
        $data = array();
        $data['title'] = "View User";
        return view('admin.users.user-show',compact('user','data'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $post = User::find($id);
        $data['title'] = "Edit User";
        $data['url'] = route('user-update',$id);
        $country = DB::table('countries')->get();   
        
        $state = DB::table('states')->orderby('name','asc')->where('country_id','231')->get();        
        $cities = DB::table('cities')->where('state_id',$post->state)->get();

        return view('admin.users.user-edit',compact('post','data','state','country','cities'));
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
        'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:1048',
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = User::find($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->mobile = $request->mobile;
        $post->city = $request->city_id;
        $post->state = $request->state_id;
        $post->password = $request->password;
        $post->status = $request->status;
        if($request->hasFile('profile_image'))
        {
            $user = 'user_'.time().'.'.$request->profile_image->extension();
            $request->profile_image->move(public_path('uploads/profile'), $user);
            $user = "/uploads/profile/".$user;
            $post->profile_image = $user;
        }
        $post->save();


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
        $delete_status_update = User::find($id);
        
        $delete_status_update->deleted_status = 1 ;
        $delete_status_update->save();
        
        return response()->json([
            'status' => true,
            'msg' => 'User deleted successfully'
		]);
    }

    public function bookmarkRemove(Request $request,$bookmark_id){

        BooksMark::find($bookmark_id)->delete();

        return response()->json([
            'status' => true,
            'msg' => 'Bookmark Removed successfully'
		]);
    }
}
