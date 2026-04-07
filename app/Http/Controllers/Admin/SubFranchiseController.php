<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use JeroenDesloovere\VCard\VCard;
use JeroenDesloovere\VCard\Property\Name;
use JeroenDesloovere\VCard\Property\Designation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Http\UploadedFile;

use Termwind\ValueObjects\list;
use App\Models\Image;
use App\Models\Franchise;
use App\Models\SubFranchise;
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



class SubFranchiseController extends Controller
{
    use ValidatesRequests;
    
    public function __construct(){
        $this->middleware('permission:sub-franchise-create', ['only' => ['create']]);
        $this->middleware('permission:sub-franchise-edit', ['only' => ['edit']]);
        $this->middleware('permission:sub-franchise-view', ['only' => ['view']]);
        $this->middleware('permission:sub-franchise-delete', ['only' => ['delete']]);
    }
    
    public function sub_all()
    {
        $franchise= SubFranchise::orderBy('created_at', 'DESC');
        return view('admin.pages.sub_franchise.sub_franchise_list',compact('franchise'));
    }

   
    public function create_sub_franchise()
    {
        $countries=Country::get();
        $states=AllState::get();
        $city=City::get();

        $franchise_name= Franchise::select('id','franchise_name')->get();


        return view('admin.pages.sub_franchise.sub_franchise_add',compact('franchise_name','countries','states','city'));
    }

    public function save_sub_franchise(REQUEST $request)
    {

        
        $validator =  \Validator::make($request->all(),[
            'pan_img'    => 'mimes:jpg,jpeg,png',
            'aadhaar_img' => 'mimes:jpg,jpeg,png',
            'gst_certificate' => 'mimes:jpg,jpeg,png'
         ]);
         
          if($validator->fails()){
             return back()->withErrors($validator->errors())->withInput();
         }

        $sub_franchise['business_name']=isset($request->business_name)&&!empty($request->business_name)?$request->business_name:NULL;
        $sub_franchise['franchise_name']=isset($request->franchise_name)&&!empty($request->franchise_name)?$request->franchise_name:NULL;
        
        
        $sub_franchise['gst_no']=isset($request->gst_no)&&!empty($request->gst_no)?$request->gst_no:NULL;
        $sub_franchise['contact_no']=isset($request->contact_no)&&!empty($request->contact_no)?$request->contact_no:NULL;
        
        $sub_franchise['email']=isset($request->email)&&!empty($request->email)?$request->email:NULL;

        $sub_franchise['country_id']=isset($request->country_id)&&!empty($request->country_id)?$request->country_id:NULL;
        $sub_franchise['state_id']=isset($request->state_id)&&!empty($request->state_id)?$request->state_id:NULL;
        $sub_franchise['city_id']=isset($request->c_name)&&!empty($request->c_name)?$request->c_name:NULL;

        $sub_franchise['contact_person']=isset($request->contact_person)&&!empty($request->contact_person)?$request->contact_person:NULL;
        $sub_franchise['pan_no']=isset($request->pan_no)&&!empty($request->pan_no)?$request->pan_no:NULL;
        $sub_franchise['aadhaar_no']=isset($request->aadhaar_no)&&!empty($request->aadhaar_no)?$request->aadhaar_no:NULL;

        $sub_franchise['rerence_franchise_name']=isset($request->rerence_franchise_name)&&!empty($request->rerence_franchise_name)?$request->rerence_franchise_name:NULL;

        $sub_franchise['franchise_code']=isset($request->franchise_code)&&!empty($request->franchise_code)?$request->franchise_code:NULL;
        $sub_franchise['status']        = '1';
        $sub_franchise['approval_status'] = NULL;

        $sub_franchise['created_at'] = date('Y-m-d H:i:s');
        $sub_franchise['created_by'] = Auth::user()->id;
        
        

        

        if ($request->hasFile('pan_img')) {

           $local_url = 'images/' . str_replace(' ', '-', $request->file('pan_img')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('pan_img')));

            //Delete old image when update franchise image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('pan_img')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $sub_franchise1['type'] = 'image';
            } 

            $sub_franchise['pan_img'] = $local_url;
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
                 $sub_franchise2['type'] = 'image';
             } 
 
             $sub_franchise['aadhaar_img'] = $local_url;
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
                 $sub_franchise3['type'] = 'image';
             } 
 
             $sub_franchise['gst_certificate'] = $local_url;
         }
       
         DB::table('sub_franchise')->insert($sub_franchise);
         return redirect()->route('admin.sub_franchise')->with('success', 'Sub-Franchise details added successfully, our team will contact you soon.');

        
    }


    

    public function sub_listing(Request $request)
    {
        extract($this->DTFilters($request->all()));

        $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

            if($userRolename =='Master Admin'){
                $franchise = SubFranchise::where('deleted_at', '=' , null)
                            ->orderBy('created_at', 'DESC')->get();

            }else{
                $franchise = SubFranchise::where('deleted_at', '=' , null)
                            ->where('created_by', '=' , Auth::user()->id )
                            ->orderBy('created_at', 'DESC')->get();
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

                    ->orWhere('rerence_franchise_name', "%".$search."%")
                    
                    
                    ->orWhere('created_at', "like", "%".$search."%");
        }

        $count = (clone $franchise)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        // $franchise->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        // $franchise = $franchise->get();

        foreach ($franchise as $key => $fran) {


            $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){


                    $created_by=User::where('id',$fran->created_by)->select('name')->first();

                    $status_action=view('admin.shared.action', ['statusshow' => true, 'id' => $fran->id, 'routeName' => 'admin.sub_franchise', 'status' => $fran->status, 'view' => false, 'edit' => false, 'delete' => false])->render();

                    if($fran->approval_status==NULL || $fran->approval_status==''){

                        $action=view('admin.shared.action') ->with(['id' => $fran->id, 
                                        'routeName' => 'admin.sub_franchise', 'view' => true, 
                                        'generate_franchise_code' => true,'sub_approve' =>true,
                                        'sub_reject' =>true])->render();
                    }
                    else{

                        if($fran->approval_status == 'Approved'){
                            $aprv_status=true;
                            $rejct_status=false;
                        }else{
                            $aprv_status=false;
                            $rejct_status=true;                        
                        }

                        $action=view('admin.shared.action')->with(['id' => $fran->id, 'routeName' => 'admin.sub_franchise', 'view' => true, 'generate_franchise_code' => true, 
                            'sub_approve' =>$aprv_status, 'sub_reject' =>$rejct_status])->render();
                    }
                    
                }
                else{

                    

                    $action=view('admin.shared.action')->with(['id' => $fran->id, 'routeName' => 'admin.sub_franchise', 'view' => true, 'edit' => true, 'delete' => false])->render();

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

            //Reference Franchise Name

            $reference_frach_id=isset($fran->rerence_franchise_name)&&!empty($fran->rerence_franchise_name)?$fran->rerence_franchise_name:NULL;

            $reference_frenchise_name=Franchise::where('id',$reference_frach_id)->select('franchise_name')->first();

            $ref_fran_name=isset($reference_frenchise_name->franchise_name)&&!empty($reference_frenchise_name->franchise_name)?$reference_frenchise_name->franchise_name:NULL;


            $country= Country::where('id', $fran->country_id)->first();
            $state= AllState::where('id', $fran->state_id)->first();
            $city= City::where('id', $fran->city_id)->first(); 

            

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
                    
                    'rerence_franchise_name' => isset($ref_fran_name) && !empty($ref_fran_name)?$ref_fran_name:NULL,
                    
                    'franchise_code' => isset($fran->franchise_code)&&!empty($fran->franchise_code)?$fran->franchise_code:NULL,
                    'created_at' => \Carbon\Carbon::parse($fran->created_at)->format('d-m-Y'),

                    'payment_status'=>'<button type="button" class="btn btn-info" ><i class="fa fa-dollar"> Payment status</i></button>',

                    'status' => $status_action,
                    'action' => $action,
                ];
            
        }
        return $records;
    }


    public function show(Request $request)
    {
        $id=$request->id;

        $sub_franchise= SubFranchise::where(['id'=>$id])->first();


        $country= Country::where('id', $sub_franchise->country_id)->first();
        $state= AllState::where('id', $sub_franchise->state_id)->first();
        $city= City::where('id', $sub_franchise->city_id)->first();

        $franchise_reference_id = SubFranchise::where('id', $id)->select('rerence_franchise_name')->first();

        $reference_franchise_id=$franchise_reference_id->rerence_franchise_name;

        
        $franchise_name= Franchise::where('id', $reference_franchise_id)->select('franchise_name')->first();
        
        return view('admin.pages.sub_franchise.sub_franchise_view', compact('sub_franchise','franchise_name','country','state','city'));
    }


    public function changeStatus(Request $request)
    {
        (new SubFranchise())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Sub Franchise Status has been Changed."]);
    }

    public function delete(Request $request)
    {
        (new SubFranchise())->deleteSubFranchise($request);

        return 'true';

        return redirect()->route('admin.sub_franchise')->with('status', 'true');
    }

    public function edit(Request $request,$id)
    {
        $userRolename = Auth::user()->roles->pluck('name')[0] ?? '';

        

        $sub_franchise = SubFranchise::where('id', $id)->first();

        $franchise= Franchise::select('id','franchise_name')->get();

        $franchise_reference_id = SubFranchise::where('id', $id)->select('rerence_franchise_name')->first();

        $countries = Country::get();
        $states = AllState::get();
        $city = City::get();

        $data = SubFranchise:: with(['country', 'state', 'city'])->find($id);

        return view('admin.pages.sub_franchise.sub_franchise_edit', compact('franchise','sub_franchise','franchise_reference_id','userRolename','data','countries','states','city'));
    }

    public function update(Request $request)
    {

        // dd($request);
        
       $id=$request->sub_franchise_id;

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

            'rerence_franchise_name' => isset($request->rerence_franchise_name) && !empty($request->rerence_franchise_name)?$request->rerence_franchise_name:NULL,

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

       

        // DB::enableQueryLog();
        DB::table('sub_franchise')->where('id', $id)->update($update);
        // dd(DB::getQueryLog());

        // return redirect()->back()->with('success', 'Franchise details updated successfully');
        return redirect()->route('admin.sub_franchise')->with('success', 'Sub Franchise details updated successfully');

    }


    public function sub_franchise_approve(Request $request,$id)
    {
        $approved ='Approved';  
        
        if($id==NULL){
            return 'Something Went Wrong';return false;
        }

       $fran_approve_status= SubFranchise::where('id', $id)->update(['approval_status'=>$approved]);
  
        if($fran_approve_status){
             return redirect()->route('admin.sub_franchise')->with('success', 'Sub Franchise details Approved');
        }else{
            return redirect()->route('admin.sub_franchise')->with('error', "Sub Franchise details Rejected");
        }

    }

    public function sub_franchise_reject(Request $request,$id)
    {
        $reject ='Rejected';  
        
        if($id==NULL){
            return 'Something Went Wrong';return false;
        }

       $fran_approve_status= SubFranchise::where('id', $id)->update(['approval_status'=>$reject]);
  
        if($fran_approve_status){
             return redirect()->route('admin.sub_franchise')->with('success', 'Sub Franchise details Rejected');
        }else{
            return redirect()->route('admin.sub_franchise')->with('error', "Sub Franchise details Rejected");
        }

    }
        
    public function generate_sub_franchise_code(Request $request,$id)
    {
        $year = date("y");  
        
        $franchise_id= SubFranchise::where('id', $id)->select('id')->first();

        $id=isset($franchise_id->id) && !empty($franchise_id->id)?$franchise_id->id:NULL;

        if($id==NULL){
            return 'Something Went Wrong';return false;
        }

       $Franchise_code='IT000'.$id.$year;

       $generate_franchise_code=$Franchise_code;

    
       $franchise_link= SubFranchise::where('id', $id)->update(['franchise_code'=>$generate_franchise_code]);
  
        if($franchise_link){
             return redirect()->route('admin.sub_franchise')->with('success', 'Sub-Franchise code generated successfully');
        }else{
            return redirect()->route('admin.sub_franchise')->with('failed', "Failed to update Sub Franchise code details");
        }

    }

}

