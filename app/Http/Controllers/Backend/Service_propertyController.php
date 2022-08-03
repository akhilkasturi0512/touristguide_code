<?php
namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use DataTables;
use Validator;

use App\Models\Business_cat;
use App\Models\Service_property;
use App\Models\Service_property_images;
use Picqer\Barcode\BarcodeGeneratorHTML;
use Picqer\Barcode\BarcodeGeneratorPNG;
use File;
class Service_propertyController extends Controller
{
 
    public function index(Request $request,$type=""){
        

        if ($request->ajax()) {

            $data = Service_property::select('service_property.*','states.name as state_name','cities.name as city_name')->where(function($query) use ($request){
                                      

                                        if(isset($request->category_id) && !empty($request->category_id)){
                                            $query->where('service_property.cat_id',$request->category_id);
                                        }

                                    })
                                    ->with('category')
                                    ->leftJoin('states','states.id','=','service_property.state')
                                    ->leftJoin('cities','cities.id','=','service_property.city')
                                     ->where(function($query) use ($request){
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
                                    ->latest()
                                    ->get();

            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                         $btn = '';
                        if($row->deleted_status!='1'){
                            $btn = '<a href="'.route("service_property-edit", $row->id).'" class="edit btn btn-primary   " style="margin-right: 15px;">Edit</a><a  style="margin-right: 15px;" href="'.route("service_property-view", $row->id).'" class="edit btn btn-primary  ">View</a>
                            <button  style="margin-right: 15px;" type="button" id="deleteButton" data-url="'.route('service_property-delete', $row->id).'" class="edit btn btn-primary ml-2 btn-sm deleteButton" data-loading-text="Deleted...." data-rest-text="Delete">Delete</button>';
                        }
                        else{
                            $btn.='<button  style="margin-right: 15px;" type="button" id="restoreButton" data-url="'.route('service_property-restore', $row->id).'" class="edit btn btn-primary ml-2 btn-sm restoreButton" data-loading-text="Restore...." data-rest-text="Restore">Restore</button>';
                        }
                        return $btn;
                    })

                    ->rawColumns(['action'])
                    ->make(true);
        }
        $data = array();

        $data['title'] = "List Property";
        $data['url'] = route('service_property-list',$type);
        
         $data['active'] = Service_property::where('deleted_status',0)->where('status',1)->count();
         $data['inactive'] = Service_property::where('deleted_status',0)->where('status',0)->count();
         $data['trashed'] = Service_property::where('deleted_status',1)->count();

        $data['owners_category'] = DB::table('business_category')->get();
        return view('admin.service.service_property',compact('data','type'));
    }



    public function create(){

        $data = array();
        $data['title'] = "Create Property";
        $data['url'] = route('service_property-save');
        
        $data['states'] = DB::table('states')->where('country_id',230)->get();
        
        $data['cities'] = DB::table('cities')->get();
        $business_cat=Business_cat::get();
        return view('admin.service.service_property-create',compact('data','business_cat'));
    }

    public function store(Request $request){

        $validator = Validator::make($request->all(), [
            'business_name' => 'required',
            'businesscat_id' => 'required',
            'price' => 'required|numeric',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()){
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = new Service_property();
        $post->business_name = $request->business_name;
        $post->cat_id = $request->businesscat_id;
        $post->price = $request->price;
        $post->state = $request->state_id;
        $post->city = $request->city_id;
        $post->longitude = $request->longitude;
        $post->latitude = $request->latitude;
        $post->address = $request->address;
        $post->description = $request->description;
        $post->status = $request->status;
        
        if($request->hasFile('image')){
            $image = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/images'), $image);
            $image = "/uploads/images/".$image;
            $post->image = $image;
        }
        $post->save();

        if ($request->file('files')) {
            foreach ($request->file('files') as $key=>$file) {
                $service_property_images = new Service_property_images();
                $service_property_images->service_property_id = $post->id;
                $image = 'servicepropertyimages'.time().$key.'.'.$file->extension();
                $file->move(public_path('/uploads/servicepropertyimages'),$image);
                $image = "/uploads/servicepropertyimages/".$image;
                $service_property_images->image = $image;
                $service_property_images->save();
            }
        }

        return response()->json([
                'status' => true,
                'msg' => 'Service Property created successfully'
			   ]);

    }

    public function show($id){

        $service_property =  Service_property::with('property_images','category')
                            ->leftjoin('states','states.id','service_property.state')
                            ->leftjoin('cities','cities.id','service_property.city')
                            ->select('service_property.*','states.name as state_name','cities.name as city_name')
                            ->find($id);
        
        $data = array();
        $data['title'] = "View Property";
        return view('admin.service.service_property-show',compact('service_property','data'));

    }

    public function edit(Request $request,$id){
        
        $post = Service_property::with('property_images','category')->find($id);
        
        $business_cat = Business_cat::get();
     
        $data['title'] = "Edit  property";
        
        $data['url'] = route('service_property-update',$id);
        
        $data['states'] = DB::table('states')->where('country_id',230)->get();
        
        $data['cities'] = DB::table('cities')->where('state_id',$post->state)->get();
        
        return view('admin.service.service_property-edit',compact('id','data','post','business_cat'));
        
    }
    
   
    public function update(Request $request, $id)
    {

        $validator = Validator::make($request->all(), [
            'business_name' => 'required',
            'businesscat_id' => 'required',
            'price' => 'required|numeric',
        ]);

        if ($validator->fails()) {
		   return response()->json([
			'status' => false,
			'errors' => $validator->errors()
			]);
		}


        $post = Service_property::find($id);
        $post->business_name = $request->business_name;
        $post->cat_id = $request->businesscat_id;
        $post->price = $request->price;
        $post->state = $request->state_id;
        $post->city = $request->city_id;
        $post->longitude = $request->longitude;
        $post->latitude = $request->latitude;
        $post->address = $request->address;
        $post->description = $request->description;
        $post->status = $request->status;
        if($request->hasFile('image'))
        {
            $image = 'image_'.time().'.'.$request->image->extension();
            $request->image->move(public_path('uploads/images'), $image);
            $image = "/uploads/images/".$image;
            $post->image = $image;
        }
        $post->save();


        if ($request->file('files')) {
            
            Service_property_images::where('service_property_id',$id)->delete();

            foreach ($request->file('files') as $key=>$file) {

                $service_property_images = new Service_property_images();
                $service_property_images->service_property_id = $post->id;

                $image = 'servicepropertyimages'.time().$key.'.'.$file->extension();
                $file->move(public_path('/uploads/servicepropertyimages'),$image);
                $image = "/uploads/servicepropertyimages/".$image;
                $service_property_images->image = $image;
                $service_property_images->save();
            }

        }
        
        return response()->json([
            'status' => true,
            'msg' => 'Property updated successfully'
			]);

    }

    public function destroy($id)
    {
        $service_property = Service_property::find($id);
        $service_property->deleted_status = '1';
        $service_property->save();

        return response()->json([
            'status' => true,
            'msg' => 'Property deleted successfully'
			]);
    }
    
    public function restore($id)
    {
        $service_property = Service_property::find($id);
        $service_property->deleted_status = '0';
        $service_property->save();

        return response()->json([
            'status' => true,
            'msg' => 'Property restore successfully'
			]);
    }
}
