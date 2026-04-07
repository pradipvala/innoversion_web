<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\City;
use App\Models\Country;
use App\Models\AllState;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth, Mail, File, DB,Exception,URL;
use Yajra\DataTables\DataTables;

class LeadController extends Controller
{
    use ValidatesRequests;

    public function __construct(){

        $this->middleware('permission:lead-create', ['only' => ['create']]);
        $this->middleware('permission:lead-edit', ['only' => ['edit']]);
        $this->middleware('permission:lead-view', ['only' => ['view']]);
        $this->middleware('permission:lead-delete', ['only' => ['delete']]);
    }

    public function all()
    {
        $lead_data= Lead::orderBy('created_at', 'DESC');
        return view('admin.pages.lead.lead_list',compact('lead_data'));
    }


    public function listing(Request $request)
    {

        if ($request->ajax()) {

            
            $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){
                    
                    $data = Lead::where('deleted_at', '=' , null)
                                ->orderBy('created_at', 'DESC')->get();

                }else{

                    $data = Lead::where('deleted_at', '=' , null)
                                        ->where('created_by', '=' , Auth::user()->id )
                                        ->orderBy('created_at', 'DESC')
                                        ->get();
                }

            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($data) {
                    $return = '<div class="btn-group">';

                    //if (auth()->user()->can('lead-view')) {
                        $return .=  '<a href="'.route('admin.lead.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                            <i class="fa fa-eye"></i>
                                        </a> &nbsp;';
                    //}

                    //if (auth()->user()->can('lead-edit')) {
                        $return .= '<a href="'.route('admin.lead.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a> &nbsp;';
                    //}

                    //if (auth()->user()->can('lead-delete')) {
                        $return .= '<a href="javascript:;" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-bars"></i>
                                        </a> &nbsp;
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="active" data-id="' . base64_encode($data->id) . '">Active</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="inactive" data-id="' . base64_encode($data->id) . '">Inactive</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="deleted" data-id="' . base64_encode($data->id) . '">Delete</a></li>
                                        </ul>';
                    //}

                    $return .= '</div>';

                    // dd($return);

                    return $return;
                })

                

                ->editColumn('created_at', function ($data) {
                    
                    return date('Y-m-d H:i:s', strtotime(date($data->created_at))); 

                    
                })

                ->editColumn('country', function ($data) {
                    
                    $country= Country::where('id', $data->country_id)->first();

                    return $country->country_name;
                })

                ->editColumn('state', function ($data) {
                    
                    $state= AllState::where('id', $data->state_id)->first();

                    return $state->state;
                })

                ->editColumn('city', function ($data) {
                    
                     $city= City::where('id', $data->city_id)->first(); 

                    return $city->c_name;
                })



                
                
                

                ->editColumn('status', function ($data) {
                        
                    if ($data->status == 'active') {
                        return '<span class="badge badge-pill badge-success">Active</span>';
                    } else if ($data->status == 'inactive') {
                        return '<span class="badge badge-pill badge-warning">Inactive</span>';
                    } else if ($data->status == 'pending') {
                        return '<span class="badge badge-pill badge-danger">Pending</span>';
                    }else if ($data->status == 'deleted') {
                        return '<span class="badge badge-pill badge-danger">Deleted</span>';
                    } else {
                        return '-';
                    }
                })

                ->rawColumns(['action', 'created_at', 'status', 'country','state','city' ])
                ->make(true);
        }

        $search = $request['search']['value'];
        
        if (!empty($search)) {
            $data->where('business_name', "like", "%" . $search . "%")
                    ->orWhere('created_at', "like", "%".$search."%");
        }
        
        
        return $data;
        
    }
   
    
    public function create()
    {
        $countries=Country::get();
        $states=AllState::get();
        $city=City::get(); 

        return view('admin.pages.lead.lead_add')->with(['city' => $city, 'countries' => $countries,  'states' => $states]);
    }

    public function save(REQUEST $request)
    {
        // dd($request);

        $validator =  \Validator::make($request->all(),[
            'file'    => 'mimes:pdf',
           ]);
         
            if($validator->fails()){
                return back()->withErrors($validator->errors())->withInput();
            }

        

        
        if($request->hasFile('file')){

            $file = $request->file;
            $timestamp = now()->format('YmdHis');
             $file_name = $timestamp . '_' .$file->getClientOriginalName();
             $folder = public_path().'/lead_file/';
             
             $path = URL::to('/').'/public/lead_file/'. $file_name;
             
             if (!File::exists($folder)) {
                 File::makeDirectory($folder, 0775, true, true);
            }
             
            $file = $file->move($folder, $file_name);
        }


        $lead_data['business_name']=isset($request->business_name)&&!empty($request->business_name)?$request->business_name:NULL;
        
        $lead_data['country_id']=isset($request->country_id)&&!empty($request->country_id)?$request->country_id:NULL;
        $lead_data['state_id']=isset($request->state_id)&&!empty($request->state_id)?$request->state_id:NULL;
        $lead_data['city_id']=isset($request->c_name)&&!empty($request->c_name)?$request->c_name:NULL;

        $lead_data['file'] = isset($path)&&!empty($path)?$path:NULL;
        
        
        $lead_data['status'] = 'active';

        $lead_data['created_at'] = date('Y-m-d H:i:s');
        $lead_data['created_by'] = Auth::user()->id;
      

        $save=Lead::create($lead_data);

        if($save){
             
            return redirect()->route('admin.lead')->with('success', 'Lead details added successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to save details');
        }
    }


    

    public function show($id)
    {   
        if(isset($id) && $id != '' && $id != null){
            $lead_id = base64_decode($id);
        }else{
            return redirect()->route('admin.lead')->with('error', 'Something went wrong');
        }

        $data = Lead::where('id', $lead_id)->first();

        $country= Country::where('id', $data->country_id)->first();
        $state= AllState::where('id', $data->state_id)->first();
        $city= City::where('id', $data->city_id)->first();

        
        
        return view('admin.pages.lead.lead_view',compact('data','country','state','city'));
    }

    public function change_status(Request $request){
        
        if (!empty($request->all())) {
            $id = base64_decode($request->id);
            $status = $request->status;

            $data = Lead::where(['id' => $id])->first();

            // dd($data);

            if(!empty($data)){
                
                $change_status = Lead::where(['id' => $id])->update(['status' => $status]);
                
                if($change_status){

                    return response()->json(['code' => 200]);
                }else{
                    return response()->json(['code' => 201]);
                }
            } else {
                return response()->json(['code' => 201]);
            }
        } else {
            return response()->json(['code' => 201]);
        }
    }
    


    public function edit(Request $request,$id)
    {
        $lead_id = base64_decode($id);

        $countries = Country::get();
        $states = AllState::get();
        $city = City::get();
  
        $data = Lead:: with(['country', 'state', 'city'])->find($lead_id);

        // dd($data);

        return view('admin.pages.lead.lead_edit')->with(['data' => $data,'city' => $city, 'countries' => $countries, 'states' => $states]);
        
        
    }

    public function update(Request $request)
    {
       
        $id=$request->id;

        if($request->hasFile('file')){

            $file = $request->file;
            $timestamp = now()->format('YmdHis');
             $file_name = $timestamp . '_' .$file->getClientOriginalName();
             $folder = public_path().'/lead_file/';
             
             $path = URL::to('/').'/public/lead_file/'. $file_name;
             
             if (!File::exists($folder)) {
                 File::makeDirectory($folder, 0775, true, true);
            }
             
            $file = $file->move($folder, $file_name);
        }


        if(empty($path)){
            $path= isset($request->lead_old_file)&&!empty($request->lead_old_file)?$request->lead_old_file:NULL;
        }


        // dd($path);
        

        
        $update['business_name'] =isset($request->business_name)&&!empty($request->business_name)?$request->business_name:NULL;
        
        $update['country_id'] =isset($request->country_id)&&!empty($request->country_id)?$request->country_id:NULL;
        $update['state_id'] =isset($request->state_id)&&!empty($request->state_id)?$request->state_id:NULL;
        $update['city_id'] =isset($request->c_name)&&!empty($request->c_name)?$request->c_name:NULL;

        $update['file'] = isset($path)&&!empty($path)?$path:NULL;
    
        $update['updated_at'] = date('Y-m-d H:i:s');
        $update['updated_by'] = Auth::user()->id;

        // dd($update);

        // DB::enableQueryLog(); dd(DB::getQueryLog());
        $update_lead=Lead::where('id', $id)->update($update);

        if($update_lead){
             
            return redirect()->route('admin.lead')->with('success', 'lead details updated successfully');
            
        }else{
            return redirect()->back()->with('failed', 'Failed to Update Details');
        }
    }
        



}
