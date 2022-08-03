<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Business_cat;
use Spatie\Permission\Models\Role;
use URL;
use DB;
use Hash;
use DataTables;
use Validator;

class Business_catController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$type="")
    {

        if ($request->ajax()) {
            $data = Business_cat::
                    where(function($query) use ($request){
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
                
                ->latest()->get();


            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        
                        $btn = '';
                        if($row->deleted_status!='1'){
                        $btn = '<a href="'.route("business_cat-edit", $row->id).'" class="edit btn btn-primary   " style="margin-right: 15px;">Edit</a><a  style="margin-right: 15px;" href="'.route("business_cat-view", $row->id).'" class="edit btn btn-primary  ">View</a>
                        <button  style="margin-right: 15px;font-weight:600;font-size:14px" type="button" id="deleteButton" data-url="'.route('business_cat-delete', $row->id).'" class="edit btn btn-primary ml-2 btn-sm deleteButton" data-loading-text="Deleted...." data-rest-text="Delete">Delete</button>';
                        }
                        else{
                            $btn.='<button  style="margin-right: 15px;" type="button" id="restoreButton" data-url="'.route('business_cat-restore', $row->id).'" class="edit btn btn-primary ml-2 btn-sm restoreButton" data-loading-text="Restore...." data-rest-text="Restore">Restore</button>';
                        }
                        return $btn;
                    })
                    ->editColumn('image',function($row){
                        return '<img width="100" height="100" src="'.URL::to($row->image).'" />';
                    })
                    ->rawColumns(['action','image'])
                    ->make(true);
        }
        $data = array();
        
         $data['active'] = Business_cat::where('deleted_status',0)->where('status',1)->count();
         $data['inactive'] = Business_cat::where('deleted_status',0)->where('status',0)->count();
         $data['trashed'] = Business_cat::where('deleted_status',1)->count();

        $data['title'] = "List Business Category";
        $data['url'] = route('business_cat-list',$type);

        return view('admin.business_cat.business_cat',compact('data','type'));
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $data = array();
        $data['title'] = "Create  Business Category";
        $data['url'] = route('business_cat-save');


        return view('admin.business_cat.business_cat-create',compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // echo"<pre>";print_r($request->all());exit;

        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:business_category',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048'

            // 'link' => 'required'
        ]);

        if ($validator->fails())
        {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = new Business_cat();
        $post->name = $request->name;
         if($request->hasFile('image'))
        {
            $image = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/businesscat'), $image);
            $image = "/uploads/businesscat/".$image;
            $post->image = $image;
        }
        $post->save();


        return response()->json([
            'status' => true,
            'msg' => ' Business Category created successfully'
			]);

    }


 public function show($id)
    {
        $business_cat = Business_cat::find($id);
        $data = array();
        $data['title'] = "View  Business Category";
        return view('admin.business_cat.business_cat-show',compact('business_cat','data'));
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Business_cat::find($id);
        $data['title'] = "Edit  Business Category";
        $data['url'] = route('business_cat-update',$id);

        return view('admin.business_cat.business_cat-edit',compact('post','data'));
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
            'image' => 'nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',

            // 'link' => 'required'
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = Business_cat::find($id);
        $post->name = $request->name;
        if($request->hasFile('image'))
        {
            $image = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/businesscat'), $image);
            $image = "/uploads/businesscat/".$image;
            $post->image = $image;
        }
        $post->save();


        return response()->json([
            'status' => true,
            'msg' => ' Business Category updated successfully'
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
         $data = Business_cat::find($id);
          $data->deleted_status = '1';
        $data->save();
        return response()->json([
            'status' => true,
            'msg' => ' Business Category deleted successfully'
			]);
    }
    
    public function restore($id)
    {
         $data = Business_cat::find($id);
          $data->deleted_status = '0';
        $data->save();
        return response()->json([
            'status' => true,
            'msg' => ' Business Category restore successfully'
			]);
    }
}
