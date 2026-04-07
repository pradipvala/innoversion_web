<?php

namespace App\Http\Controllers\Home_Dashboard;

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
use DB;

class SubFranchiseController extends Controller
{
    public function __construct(){
        
        $this->middleware('permission:sub-franchise-create', ['only' => ['create']]);
        $this->middleware('permission:sub-franchise-edit', ['only' => ['edit']]);
        $this->middleware('permission:sub-franchise-view', ['only' => ['view']]);
        $this->middleware('permission:sub-franchise-delete', ['only' => ['delete']]);
    }

    public function sub_all()
    {
        $franchise= SubFranchise::orderBy('created_at', 'DESC');
        return view('frontend.sub_franchise.sub_franchise_list',compact('franchise'));
    }

   
    public function create_franchise()
    {
        $franchise= Franchise::select('id','franchise_name')->get();
        return view('frontend.sub_franchise.sub_franchise_add',compact('franchise'));
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

        $franchise['business_name']=isset($request->business_name)&&!empty($request->business_name)?$request->business_name:NULL;
        $franchise['franchise_name']=isset($request->franchise_name)&&!empty($request->franchise_name)?$request->franchise_name:NULL;
        
        
        $franchise['gst_no']=isset($request->gst_no)&&!empty($request->gst_no)?$request->gst_no:NULL;
        $franchise['contact_no']=isset($request->contact_no)&&!empty($request->contact_no)?$request->contact_no:NULL;
        
        $franchise['email']=isset($request->email)&&!empty($request->email)?$request->email:NULL;

        $franchise['country']=isset($request->country)&&!empty($request->country)?$request->country:NULL;
        $franchise['state']=isset($request->state)&&!empty($request->state)?$request->state:NULL;
        $franchise['city']=isset($request->city)&&!empty($request->city)?$request->city:NULL;
        $franchise['contact_person']=isset($request->contact_person)&&!empty($request->contact_person)?$request->contact_person:NULL;
        $franchise['pan_no']=isset($request->pan_no)&&!empty($request->pan_no)?$request->pan_no:NULL;
        $franchise['aadhaar_no']=isset($request->aadhaar_no)&&!empty($request->aadhaar_no)?$request->aadhaar_no:NULL;

        $franchise['rerence_franchise_name']=isset($request->rerence_franchise_name)&&!empty($request->rerence_franchise_name)?$request->rerence_franchise_name:NULL;

        $franchise['franchise_code']=isset($request->franchise_code)&&!empty($request->franchise_code)?$request->franchise_code:NULL;
        $franchise['status']        = '1';

        $franchise['created_at'] = date('Y-m-d H:i:s');
        $franchise['created_by'] = 1;
        
        

        

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
       
         DB::table('sub_franchise')->insert($franchise);
         return redirect()->route('sub_franchise')->with('success', 'Franchise details added successfully');

        
    }


    

    public function sub_listing(Request $request)
    {
        extract($this->DTFilters($request->all()));

        $franchise = SubFranchise::orderBy('created_at', 'DESC')->get();

        
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

            $reference_frach_id=isset($fran->rerence_franchise_name)&&!empty($fran->rerence_franchise_name)?$fran->rerence_franchise_name:NULL;

            $reference_frenchise_name=Franchise::where('id',$reference_frach_id)->select('franchise_name')->first();

            $ref_fran_name=isset($reference_frenchise_name->franchise_name)&&!empty($reference_frenchise_name->franchise_name)?$reference_frenchise_name->franchise_name:NULL;

            

                $records['data'][] = [
                    'id' => $key + 1,
                    
                    'business_name' => isset($fran->business_name) && !empty($fran->business_name)?$fran->business_name:NULL,
                    'franchise_name' => isset($fran->franchise_name) && !empty($fran->franchise_name)?$fran->franchise_name:NULL,
                    
                    'gst_no' => isset($fran->gst_no) && !empty($fran->gst_no)?$fran->gst_no:NULL,
                    'contact_no' => isset($fran->contact_no) && !empty($fran->contact_no)?$fran->contact_no:NULL,
                    'email' => isset($fran->email) && !empty($fran->email)?$fran->email:NULL,

                    'country' => isset($fran->country) && !empty($fran->country)?$fran->country:NULL,
                    'state' => isset($fran->state) && !empty($fran->state)?$fran->state:NULL,
                    'city' => isset($fran->gst_no) && !empty($fran->gst_no)?$fran->gst_no:NULL,

                    'contact_person' => isset($fran->contact_person) && !empty($fran->contact_person)?$fran->contact_person:NULL,
                    'pan_no' => isset($fran->pan_no) && !empty($fran->pan_no)?$fran->pan_no:NULL,
                    'aadhaar_no' => isset($fran->aadhaar_no) && !empty($fran->aadhaar_no)?$fran->aadhaar_no:NULL,
                    
                    'pan_img' => '<img src="' . (!empty($fran->pan_img) ? \Storage::url($fran->pan_img) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    'aadhaar_img' => '<img src="' . (!empty($fran->aadhaar_img) ? \Storage::url($fran->aadhaar_img) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    'gst_certificate' => '<img src="' . (!empty($fran->gst_certificate) ? \Storage::url($fran->gst_certificate) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    
                    'rerence_franchise_name' => isset($ref_fran_name) && !empty($ref_fran_name)?$ref_fran_name:NULL,
                    
                    'franchise_code' => isset($fran->franchise_code)&&!empty($fran->franchise_code)?$fran->franchise_code:NULL,

                    'created_at' => \Carbon\Carbon::parse($fran->created_at)->format('d-m-Y'),
                    'status' => view('frontend.shared.action', ['statusshow' => true, 'id' => $fran->id, 'routeName' => 'sub_franchise', 'status' => $fran->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                    'action' => view('frontend.shared.action')
                    ->with(['id' => $fran->id, 'routeName' => 'sub_franchise', 'view' => false, 'generate_franchise_code' => true])
                    ->render(),
                ];
            
        }
        return $records;
    }

    public function changeStatus(Request $request)
    {
        (new SubFranchise())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Franchise Status has been Changed."]);
    }

    public function delete(Request $request)
    {
        (new SubFranchise())->deleteFranchise($request);

        return redirect()->route('sub_franchise')->with('success', 'Franchise details deleted successfully');
        // return 'true';
    }

    public function edit(Request $request,$id)
    {
        $sub_franchise = SubFranchise::where('id', $id)->first();

        $franchise= Franchise::select('id','franchise_name')->get();

        $franchise_reference_id = SubFranchise::where('id', $id)->select('rerence_franchise_name')->first();

        // $franchise_reference_id = Franchise::leftJoin('sub_franchise', 'sub_franchise.rerence_franchise_name', '=', 'franchise.id')
        //                             ->where('sub_franchise.id','=', $id)
        //                             ->select('franchise.id','franchise.franchise_name')->first();
       
        
        return view('frontend.sub_franchise.sub_franchise_edit', compact('franchise','sub_franchise','franchise_reference_id'));
    }

    public function update(Request $request)
    {
       $id=$request->sub_franchise_id;

       $update= [
            'business_name' => isset($request->business_name) && !empty($request->business_name)?$request->business_name :NULL,
            'franchise_name' => isset($request->franchise_name) && !empty($request->franchise_name)?$request->franchise_name :NULL,

            'gst_no' => isset($request->gst_no) && !empty($request->gst_no)?$request->gst_no:NULL,

            'contact_no' => isset($request->contact_no) && !empty($request->contact_no)?$request->contact_no:NULL,
            'email' => isset($request->email) && !empty($request->email)?$request->email:NULL,

            'country' => isset($request->country) && !empty($request->country)?$request->country:NULL,
            'state' => isset($request->state) && !empty($request->state)?$request->state:NULL,
            'city' => isset($request->city) && !empty($request->city)?$request->city:NULL,


            'contact_person' => isset($request->contact_person) && !empty($request->contact_person)?$request->contact_person:NULL,
            'pan_no' => isset($request->pan_no) && !empty($request->pan_no)?$request->pan_no:NULL,

            'aadhaar_no' => isset($request->aadhaar_no) && !empty($request->aadhaar_no)?$request->aadhaar_no:NULL,

            'rerence_franchise_name' => isset($request->rerence_franchise_name) && !empty($request->rerence_franchise_name)?$request->rerence_franchise_name:NULL,
            
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' =>1,
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
        return redirect()->route('sub_franchise')->with('success', 'Franchise details updated successfully');

        

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
             return redirect()->route('sub_franchise')->with('success', 'Franchise details updated successfully');
        }else{
            return redirect()->route('sub_franchise')->with('failed', "Failed to update Franchise details");
        }

    }

}
