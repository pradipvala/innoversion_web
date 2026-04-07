<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use JeroenDesloovere\VCard\VCard;
use JeroenDesloovere\VCard\Property\Name;
use JeroenDesloovere\VCard\Property\Designation;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

use Termwind\ValueObjects\list;
use App\Models\Image;
use App\Models\Franchise;
use App\Models\User;

use App\Models\City;
use App\Models\Country;
use App\Models\AllState;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Auth, Mail, File, DB,Exception;
use Yajra\DataTables\DataTables;

class FranchiseController extends Controller
{
    use ValidatesRequests;

    public function __construct(){
        $this->middleware('permission:franchise-create', ['only' => ['create']]);
        $this->middleware('permission:franchise-edit', ['only' => ['edit']]);
        $this->middleware('permission:franchise-view', ['only' => ['view']]);
        $this->middleware('permission:franchise-delete', ['only' => ['delete']]);
    }

    
    public function all()
    {
        $franchise= Franchise::orderBy('created_at', 'DESC');
        return view('admin.pages.franchise.franchise_list',compact('franchise'));
    }

   
    
    public function create_franchise()
    {
        $countries=Country::get();
        $states=AllState::get();
        $city=City::get(); 


        return view('admin.pages.franchise.franchise_add')->with(['city' => $city, 'countries' => $countries,  'states' => $states]);
    }

    public function save_franchise(REQUEST $request)
    {

        $validator =  \Validator::make($request->all(),[
            'pan_img'    => 'mimes:jpg,jpeg,png',
            'aadhaar_img' => 'mimes:jpg,jpeg,png',
            'gst_certificate' => 'mimes:jpg,jpeg,png'
         ]);
         
          if($validator->fails()){
             return back()->withErrors($validator->errors())->withInput();
         }

        $franchise['business_name']=isset($request->business_name)&&!empty($request->business_name)?$request->business_name:NULL;
        $franchise['franchise_name']=isset($request->franchise_name)&&!empty($request->franchise_name)?$request->franchise_name:NULL;
        
        
        $franchise['gst_no']=isset($request->gst_no)&&!empty($request->gst_no)?$request->gst_no:NULL;
        $franchise['contact_no']=isset($request->contact_no)&&!empty($request->contact_no)?$request->contact_no:NULL;
        
        $franchise['email']=isset($request->email)&&!empty($request->email)?$request->email:NULL;

        $franchise['country_id']=isset($request->country_id)&&!empty($request->country_id)?$request->country_id:NULL;
        $franchise['state_id']=isset($request->state_id)&&!empty($request->state_id)?$request->state_id:NULL;
        $franchise['city_id']=isset($request->c_name)&&!empty($request->c_name)?$request->c_name:NULL;

        $franchise['contact_person']=isset($request->contact_person)&&!empty($request->contact_person)?$request->contact_person:NULL;
        $franchise['pan_no']=isset($request->pan_no)&&!empty($request->pan_no)?$request->pan_no:NULL;
        $franchise['aadhaar_no']=isset($request->aadhaar_no)&&!empty($request->aadhaar_no)?$request->aadhaar_no:NULL;

        $franchise['franchise_code']=isset($request->franchise_code)&&!empty($request->franchise_code)?$request->franchise_code:NULL;
        $franchise['approval_status'] = NULL;
        $franchise['status'] = '1';

        $franchise['created_at'] = date('Y-m-d H:i:s');
        $franchise['created_by'] = Auth::user()->id;
        
        

        

        if ($request->hasFile('pan_img')) {

           $local_url = 'images/' . str_replace(' ', '-', $request->file('pan_img')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('pan_img')));

            //Delete old image when update franchise image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('pan_img')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $franchise1['type'] = 'image';
            } 

            $franchise['pan_img'] = $local_url;
        }


        if ($request->hasFile('aadhaar_img')) {

            $local_url = 'images/' . str_replace(' ', '-', $request->file('aadhaar_img')->getClientOriginalName());
             \Storage::disk('public')->put($local_url, file_get_contents($request->file('aadhaar_img')));
 
             //Delete old image when update franchise image
             if ($request->old_image !== null) {
                 \Storage::delete($request->old_image);
             }
 
             
             $ext = pathinfo($request->file('aadhaar_img')->getClientOriginalName(), PATHINFO_EXTENSION);
 
             if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                 $franchise2['type'] = 'image';
             } 
 
             $franchise['aadhaar_img'] = $local_url;
         }

         if ($request->hasFile('gst_certificate')) {

            $local_url = 'images/' . str_replace(' ', '-', $request->file('gst_certificate')->getClientOriginalName());
             \Storage::disk('public')->put($local_url, file_get_contents($request->file('gst_certificate')));
 
             //Delete old image when update franchise image
             if ($request->old_image !== null) {
                 \Storage::delete($request->old_image);
             }
 
             
             $ext = pathinfo($request->file('gst_certificate')->getClientOriginalName(), PATHINFO_EXTENSION);
 
             if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                 $franchise3['type'] = 'image';
             } 
 
             $franchise['gst_certificate'] = $local_url;
         }

         DB::table('franchise')->insert($franchise);

         return redirect()->route('admin.franchise')->with('success', 'Franchise details added successfully, our team will contact you soon.');

        //  return redirect()->back();  // old
        
    }


    

    public function listing(Request $request)
    {
        

        extract($this->DTFilters($request->all()));

        $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){
                    $franchise = Franchise::where('deleted_at', '=' , null)
                                ->orderBy('created_at', 'DESC');

                }else{
                    $franchise = Franchise::where('deleted_at', '=' , null)
                                ->where('created_by', '=' , Auth::user()->id )
                                ->orderBy('created_at', 'DESC');
                }

        

        $search = $request['search']['value'];
        if (!empty($search)) {
            $franchise->where('business_name', "like", "%" . $search . "%")
                    ->orWhere('franchise_name', "like", "%".$search."%")
                    ->orWhere('gst_no', "like", "%".$search."%")
                    ->orWhere('contact_no', "like", "%".$search."%")
                    ->orWhere('email', "like", "%".$search."%")

                    ->orWhere('country', "like", "%".$search."%")
                    ->orWhere('state', "like", "%".$search."%")
                    ->orWhere('city', "like", "%".$search."%")

                    ->orWhere('pan_no', "like", "%".$search."%")
                    ->orWhere('aadhaar_no', "like", "%".$search."%")

                    ->orWhere('pan_img', "like", "%".$search."%")
                    ->orWhere('aadhaar_img', "like", "%".$search."%")
                    ->orWhere('gst_certificate', "like", "%".$search."%")
                    
                    
                    ->orWhere('created_at', "like", "%".$search."%");
        }

        $count = (clone $franchise)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $franchise->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $franchise = $franchise->get();

        

        // dd($franchise);

        foreach ($franchise as $key => $fran) {


            $country= Country::where('id', $fran->country_id)->first();
            $state= AllState::where('id', $fran->state_id)->first();
            $city= City::where('id', $fran->city_id)->first(); 

            $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){

                    $created_by=User::where('id',$fran->created_by)->select('name')->first();

                    $status_action=view('admin.shared.action', ['statusshow' => true, 'id' => $fran->id, 'routeName' => 'admin.franchise', 'status' => $fran->status, 'view' => false, 'edit' => false, 'delete' => false])->render();

                    $payment_status='<button type="button" class="btn btn-info" ><i class="fa fa-dollar"> Payment Due</i></button>';

                    if($fran->approval_status==NULL || $fran->approval_status==''){
                        $action=view('admin.shared.action')->with(['id' => $fran->id, 'routeName' => 'admin.franchise', 'view' => true, 'franchise_code' => true, 'approve' =>true, 'reject' =>true])->render();
                    }
                    else{

                        if($fran->approval_status == 'Approved'){
                            $aprv_status=true;
                            $rejct_status=false;
                        }else{
                            $aprv_status=false;
                            $rejct_status=true;                        
                        }

                        $action=view('admin.shared.action')->with(['id' => $fran->id, 'routeName' => 'admin.franchise', 'view' => true, 'franchise_code' => true, 'approve' =>$aprv_status, 'reject' =>$rejct_status])->render();
                    }
                    
                }
                else{

                    

                    $payment_status='<button type="button" class="btn btn-info" id="payment_status_btn" onclick="payment_status('.$fran->id.')"><i class="fa fa-dollar"> Pay Now</i></button>';
                    


                    $action=view('admin.shared.action')->with(['id' => $fran->id, 'routeName' => 'admin.franchise', 'view' => true, 'edit' => true, 'delete' => false])->render();

                    if($fran->approval_status == 'Approved'){

                        $status_action='<button type="button" class="btn btn-success" ><i class="fa fa-check-circle"> Approved</i></button>';
                    }

                    else if($fran->approval_status == 'Rejected'){

                        $status_action='<button type="button" class="btn btn-danger"><i class="fa fa-times-circle"> Rejected</i></button>';  
                    }

                    else{
                        
                        $status_action='<button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> Pending For Approval</button>';
                    }
                }
                
                
                $records['data'][] = [
                    'id' => $key + 1,
                    
                    'business_name' => isset($fran->business_name) && !empty($fran->business_name)?$fran->business_name:NULL,
                    'franchise_name' => isset($fran->franchise_name) && !empty($fran->franchise_name)?$fran->franchise_name:NULL,
                    'created_by' =>isset($created_by->name) && !empty($created_by->name)?$created_by->name:NULL,
                    
                    'contact_no' => isset($fran->contact_no) && !empty($fran->contact_no)?$fran->contact_no:NULL,
                    'email' => isset($fran->email) && !empty($fran->email)?$fran->email:NULL,

                    'country' => isset($country->country_name) && !empty($country->country_name)?$country->country_name:NULL,
                    'state' => isset($state->state) && !empty($state->state)?$state->state:NULL,
                    'city' => isset($city->c_name) && !empty($city->c_name)?$city->c_name:NULL,

                    'contact_person' => isset($fran->contact_person) && !empty($fran->contact_person)?$fran->contact_person:NULL,
                    
                    'franchise_code' => isset($fran->franchise_code)&&!empty($fran->franchise_code)?$fran->franchise_code:NULL,
                    
                    'created_at' => \Carbon\Carbon::parse($fran->created_at)->format('d-m-Y'),

                    // 'payment_status'=>'<a href="'.url('admin/api/phonepe/checkout').'" >'.$payment_status.'</a>',

                    'payment_status'=>$payment_status,

                    'status' => $status_action,
                    'action' => $action,
                ];
            
        }
        return $records;
    }

    public function show(Request $request)
    {
        $id=$request->id;

        $franchise= Franchise::where(['id'=>$id])->first();

        $country= Country::where('id', $franchise->country_id)->first();
        $state= AllState::where('id', $franchise->state_id)->first();
        $city= City::where('id', $franchise->city_id)->first();

        return view('admin.pages.franchise.franchise_view', compact('franchise','country','state','city'));
    }

    public function changeStatus(Request $request)
    {
        (new Franchise())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Franchise Status has been Changed."]);
    }

    public function delete(Request $request)
    {
        (new Franchise())->deleteFranchise($request);

        return 'true';

        return redirect()->route('admin.franchise')->with('status', 'true');

    }

    public function edit(Request $request,$id)
    {

        $userRolename = Auth::user()->roles->pluck('name')[0] ?? '';
        
        $franchise= Franchise::where('id', $id)->first();

        $countries = Country::get();
        $states = AllState::get();
        $city = City::get();

        $data = Franchise:: with(['country', 'state', 'city'])->find($id);
        
        return view('admin.pages.franchise.franchise_edit', compact('franchise','userRolename','data','countries','states','city'));
    }

    public function update(Request $request)
    {
        // dd($request);
        
        $id=$request->franchise_id;

        if(isset($request->approved_btn_check)&&!empty($request->approved_btn_check))
        {
            if($request->approved_btn_check==1){
                $approval_status='Approved';
            }else{
                $approval_status='Rejected';
            }
        }

       $update= [
            'business_name' => isset($request->business_name) && !empty($request->business_name)?$request->business_name :NULL,
            'franchise_name' => isset($request->franchise_name) && !empty($request->franchise_name)?$request->franchise_name :NULL,

            'gst_no' => isset($request->gst_no) && !empty($request->gst_no)?$request->gst_no:NULL,

            'contact_no' => isset($request->contact_no) && !empty($request->contact_no)?$request->contact_no:NULL,
            'email' => isset($request->email) && !empty($request->email)?$request->email:NULL,

            'country_id' => isset($request->country_id) && !empty($request->country_id)?$request->country_id:NULL,
            'state_id' => isset($request->state_id) && !empty($request->state_id)?$request->state_id:NULL,
            'city_id' => isset($request->c_name) && !empty($request->c_name)?$request->c_name:NULL,


            'contact_person' => isset($request->contact_person) && !empty($request->contact_person)?$request->contact_person:NULL,
            'pan_no' => isset($request->pan_no) && !empty($request->pan_no)?$request->pan_no:NULL,

            'aadhaar_no' => isset($request->aadhaar_no) && !empty($request->aadhaar_no)?$request->aadhaar_no:NULL,
            'approval_status' => isset($request->approval_status) && !empty($request->approval_status)?$request->approval_status:NULL,
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' =>Auth::user()->id,
            
        ];

        if ($request->hasFile('pan_img')) {

            $local_url = 'images/' . str_replace(' ', '-', $request->file('pan_img')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('pan_img')));

            $imagepath=$request->file('pan_img')->store('public/images/franchise');

            //Delete old image when update Card image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('pan_img')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $update1['type'] = 'image';
            } 

            $update['pan_img'] = $local_url;

            
            
        }

        if ($request->hasFile('aadhaar_img')) {

            // save image in public storage
            $local_url = 'images/' . str_replace(' ', '-', $request->file('aadhaar_img')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('aadhaar_img')));


            $imagepath=$request->file('aadhaar_img')->store('public/images/franchise');

            //Delete old image when update Card image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('aadhaar_img')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $update2['type'] = 'image';
            } 

            $update['aadhaar_img'] = $local_url;
            
        }

        if ($request->hasFile('gst_certificate')) {

            // save image in public storage
            $local_url = 'images/' . str_replace(' ', '-', $request->file('gst_certificate')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('gst_certificate')));


            $imagepath=$request->file('gst_certificate')->store('public/images/franchise');

            //Delete old image when update Card image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('gst_certificate')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $update2['type'] = 'image';
            } 

            $update['gst_certificate'] = $local_url;
            
        }
        // DB::enableQueryLog(); dd(DB::getQueryLog());
        DB::table('franchise')->where('id', $id)->update($update);
        
        return redirect()->route('admin.franchise')->with('success', 'Franchise details updated successfully');

    }
        

    public function generate_franchise_code(Request $request,$id)
    {
        $year = date("y");  
        
        $franchise_id= Franchise::where('id', $id)->select('id')->first();

        $id=isset($franchise_id->id) && !empty($franchise_id->id)?$franchise_id->id:NULL;

        if($id==NULL){
            return 'Something Went Wrong';return false;
        }

       $Franchise_code='IT000'.$id.$year;

       $generate_franchise_code=$Franchise_code;

    
       $franchise_link= Franchise::where('id', $id)->update(['franchise_code'=>$generate_franchise_code]);
  
        if($franchise_link){
             return redirect()->route('admin.franchise')->with('success', 'Franchise code generated successfully');
        }else{
            return redirect()->route('admin.franchise')->with('error', "Failed to update Franchise Code details");
        }

    }

    public function franchise_approve(Request $request,$id)
    {
        $approved ='Approved';  
        
        if($id==NULL){
            return 'Something Went Wrong';return false;
        }

       $fran_approve_status= Franchise::where('id', $id)->update(['approval_status'=>$approved]);
  
        if($fran_approve_status){
             return redirect()->route('admin.franchise')->with('success', 'Franchise details Approved');
        }else{
            return redirect()->route('admin.franchise')->with('error', "Franchise details Rejected");
        }

    }

    public function franchise_reject(Request $request,$id)
    {
        $reject ='Rejected';  
        
        if($id==NULL){
            return 'Something Went Wrong';return false;
        }

       $fran_approve_status= Franchise::where('id', $id)->update(['approval_status'=>$reject]);
  
        if($fran_approve_status){
             return redirect()->route('admin.franchise')->with('success', 'Franchise details Rejected');
        }else{
            return redirect()->route('admin.franchise')->with('error', "Franchise details Rejected");
        }

    }


    public function new_under_test_listing(Request $request)
    {
        if ($request->ajax()) {

            $data = Franchise::where('deleted_at', '=' , null)->orderBy('created_at', 'DESC');

            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($data) {
                    $return = '<div class="">';

                    
                        $return .= '<a href="'.route('admin.franchise.edit', ['id' => $data->id]).'" class="edit_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button>
                                        </a> &nbsp;';

                        $return .= '</div>';

                    return $return;
                })

                ->editColumn('business_name', function ($data) {
                    
                    return $data->business_name;
                    
                })

                ->editColumn('franchise_name', function ($data) {
                    
                    return $data->franchise_name;
                    
                })

                ->editColumn('gst_no', function ($data) {
                    
                    return $data->gst_no;
                    
                })

                ->editColumn('contact_no', function ($data) {
                    
                    return $data->contact_no;
                    
                })

                ->editColumn('email', function ($data) {
                    
                    return $data->email;
                    
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


                ->editColumn('contact_person', function ($data) {
                    
                    return $data->contact_person;
                    
                })


                ->editColumn('pan_no', function ($data) {
                    
                    return $data->pan_no;
                    
                })


                ->editColumn('aadhaar_no', function ($data) {
                    
                    return $data->aadhaar_no;
                    
                })

                ->editColumn('pan_img', function ($data) {
                    
                    return '<img src="' . (!empty($data->pan_img) ? \Storage::url($data->pan_img) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';
                    
                })

                ->editColumn('aadhaar_img', function ($data) {
                    
                    return '<img src="' . (!empty($data->aadhaar_img) ? \Storage::url($data->aadhaar_img) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';
                    
                })

                ->editColumn('gst_certificate', function ($data) {
                    
                    return '<img src="' . (!empty($data->gst_certificate) ? \Storage::url($data->gst_certificate) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';
                    
                })

                ->editColumn('franchise_code', function ($data) {
                    
                    return isset($data->franchise_code)&&!empty($data->franchise_code)?$data->franchise_code:NULL;
                    
                })

                

                ->editColumn('created_at', function ($data) {
                    
                    return date('Y-m-d', strtotime(date($data->created_at))); 

                    
                })

                ->editColumn('status', function ($data) {
                    
                    view('admin.shared.action', ['statusshow' => true, 'id' => $data->id, 'routeName' => 'franchise', 'status' => $data->status, 'view' => false, 'edit' => false, 'delete' => false])->render();
                })

                ->rawColumns(['business_name','franchise_name','gst_no', 'contact_no', 'email', 'country','state','city','contact_person','pan_no','aadhaar_no','pan_img','aadhaar_img','gst_certificate','franchise_code','created_at','status','action'])
                ->make(true);
        }

        $search = $request['search']['value'];
        if (!empty($search)) {
            $data->where('business_name', "like", "%" . $search . "%")
                    ->orWhere('franchise_name', "like", "%".$search."%")
                    ->orWhere('gst_no', "like", "%".$search."%")
                    ->orWhere('contact_no', "like", "%".$search."%")
                    ->orWhere('email', "like", "%".$search."%")

                    ->orWhere('country', "like", "%".$search."%")
                    ->orWhere('state', "like", "%".$search."%")
                    ->orWhere('city', "like", "%".$search."%")

                    ->orWhere('pan_no', "like", "%".$search."%")
                    ->orWhere('aadhaar_no', "like", "%".$search."%")

                    ->orWhere('pan_img', "like", "%".$search."%")
                    ->orWhere('aadhaar_img', "like", "%".$search."%")
                    ->orWhere('gst_certificate', "like", "%".$search."%")
                    
                    
                    ->orWhere('created_at', "like", "%".$search."%");
        }
        
        return $data;
    }


}

