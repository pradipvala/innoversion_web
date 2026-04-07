<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use JeroenDesloovere\VCard\VCard;
use JeroenDesloovere\VCard\Property\Name;
use JeroenDesloovere\VCard\Property\Designation;
use SimpleSoftwareIO\QrCode\Facades\QrCode;


use App\Models\Digital_Vcard;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App;
use Illuminate\Http\UploadedFile;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Auth, Mail, File, DB,Exception;
use Yajra\DataTables\DataTables;


class DigitalVisitingCardController extends Controller
{
    use ValidatesRequests;
    
    public function __construct(){
        $this->middleware('permission:visiting-card-create', ['only' => ['create']]);
        $this->middleware('permission:visiting-card-edit', ['only' => ['edit']]);
        $this->middleware('permission:visiting-card-view', ['only' => ['view']]);
        $this->middleware('permission:visiting-card-delete', ['only' => ['delete']]);
    }
    
    public function qr_data()
    {
        return QrCode::generate('Hello, World!');
    }


    public function create()
    {
        $card = Digital_Vcard::orderBy('created_at', 'DESC');
        return view('admin.pages.vising_card.digital_vising_card_page',compact('card'));
    }

    
    public function all()
    {
        $card = Digital_Vcard::orderBy('created_at', 'DESC');
        return view('admin.pages.vising_card.list',compact('card'));
    }

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        

        $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){

                    $card = Digital_Vcard::orderBy('created_at', 'DESC');
                    
                }else{
                    
                    $card = Digital_Vcard::where('deleted_at', '=' , null)
                                        ->where('created_by', '=' , Auth::user()->id )
                                        ->orderBy('created_at', 'DESC');
                }




        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $card->where('name', "like", "%" . $search . "%")
                    ->orWhere('designation', "like", "%".$search."%")
                    ->orWhere('company_name', "like", "%".$search."%")
                    ->orWhere('company_description', "like", "%".$search."%")

                    ->orWhere('phone_no', "like", "%".$search."%")
                    ->orWhere('email', "like", "%".$search."%")
                    ->orWhere('website', "like", "%".$search."%")
                    ->orWhere('address', "like", "%".$search."%")
                    ->orWhere('location', "like", "%".$search."%")

                    ->orWhere('whatsapp_no', "like", "%".$search."%")
                    ->orWhere('facebook', "like", "%".$search."%")
                    ->orWhere('x_link', "like", "%".$search."%")
                    ->orWhere('linkedin', "like", "%".$search."%")
                    ->orWhere('instagram', "like", "%".$search."%")

                    ->orWhere('generated_vcard_link', "like", "%".$search."%")
                    
                    ->orWhere('created_at', "like", "%".$search."%");
        }

        $count = (clone $card)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $card->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $card = $card->get();

        foreach ($card as $key => $vcard) {

            $generate_vcard= "route({{'generate_vcard/$vcard->id'}})";

            //foreach ($vcard->company_logo as $key => $image) {
                $records['data'][] = [
                    'id' => $key + 1,
                    
                    'company_logo' => '<img src="' . (!empty($vcard->company_logo) ? \Storage::url($vcard->company_logo) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    
                    'name' => $vcard->name,
                    'designation' => $vcard->designation,

                    'company_name' => $vcard->company_name,
                    'company_description' => wordwrap($vcard->company_description, 15, "\n", TRUE),

                    'phone_no' => $vcard->phone_no,
                    'email' => $vcard->email,

                    // 'website' => QrCode::size(150)->color(75, 0, 130)->generate('Hi Company name'),
                    // 'website' => QrCode::generate($vcard->website),
                    'website' => '<a href="'.$vcard->website.'" target="_blank">'.$vcard->website.'</a>',

                   
                    'address' => $vcard->address,
                    'location' => $vcard->location,

                    'whatsapp_no' => $vcard->whatsapp_no,
                    'facebook' => '<a href="'.$vcard->facebook.'" target="_blank">'.$vcard->facebook.'</a>',
                    'x_link' => '<a href="'.$vcard->x_link.'" target="_blank">'.$vcard->x_link.'</a>',
                    'linkedin' => '<a href="'.$vcard->linkedin.'" target="_blank">'.$vcard->linkedin,
                    'instagram' => '<a href="'.$vcard->instagram.'k" target="_blank">'.$vcard->instagram,

                    // 'generated_vcard_link' => '<a href="'.url('card/show/'.$vcard->id).'" target="_blank">'.$vcard->generated_vcard_link.'</a>',



                    'generated_vcard_link' => '<a href="'.url('card/show/'.$vcard->id).'" target="_blank">'.wordwrap($vcard->generated_vcard_link, 35, "\n", true).'</a>',
                    
                    'wallet_pay_qr_code' => '<img src="' . (!empty($vcard->wallet_pay_qr_code) ? \Storage::url($vcard->wallet_pay_qr_code) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    
                    'created_at' => \Carbon\Carbon::parse($vcard->created_at)->format('d-m-Y'),
                    'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $vcard->id, 'routeName' => 'admin.card', 'status' => $vcard->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                    'action' => view('admin.shared.action')->with(['id' => $vcard->id, 'routeName' => 'admin.card', 'view' => true, 'generate_vcard' => true])->render(),
                ];
            //}
        }
        return $records;
    }

    public function edit(Request $request,$id)
    {
        $card= Digital_Vcard::where('id', $id)->first();

        return view('admin.pages.vising_card.edit_vcard', compact('card'));
    }

    public function update(Request $request)
    {
        $id=$request->card_id;

        (new Digital_Vcard())->updateCard($request);

        return redirect()->route('admin.card')->with('success', 'Card details updated successfully');

    }

    public function show(Request $request)
    {
        $id=$request->id;

        $card= Digital_Vcard::where(['id'=>$id])->first();

        return view('admin.pages.vising_card.show_digital_vising_card', compact('card'));
    }

    public function changeStatus(Request $request)
    {
        (new Digital_Vcard())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Card Status has been Changed."]);
    }

    public function delete(Request $request)
    {

        $id=isset($request->id)&&!empty($request->id)?$request->id:NULL;

        (new Digital_Vcard())->deleteCard($request);

        return 'true';

        return redirect()->route('admin.card')->with('status', 'true');
    }


    public function save_card_details(Request $request)
    {   

        $validator = \Validator::make($request->all(), [
            'company_logo' => 'mimes:jpg,jpeg,png,PNG,JPEG,JPG | max:20000',
            'wallet_pay_qr_code' => 'mimes:jpg,jpeg,png,PNG,JPEG,JPG | max:20000',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        (new Digital_Vcard())->saveCard($request);

        return redirect()->route('admin.card')->with('success', 'Card details saved successfully');
    }


    public function generate_vcard(Request $request,$id)
    {
        $id = base64_decode($id);

        $card= Digital_Vcard::where('id', $id)->first();
        $vcard = new VCard();

       // define variables
        $name = $card->name;
        $designation = $card->designation;
        
        $company_name = $card->company_name;
        $company_description = $card->company_description; 
        
        $phone_no = $card->phone_no;
        $email = $card->email;

        $address = $card->address;
        $location = $card->location;

        $website = $card->website;
        $whatsapp_no = $card->whatsapp_no;
        $facebook = $card->facebook;
        $x_link = $card->x_link;
        $linkedin = $card->linkedin;
        $instagram = $card->instagram;

       
       $vcard->addName($name);
       $vcard->addRole($designation);
       $vcard->addCompany($company_name,$company_description);
       $vcard->addEmail($email);
       $vcard->addPhoneNumber($phone_no);
       $vcard->addAddress($address,$location);
       $vcard->addURL($website,$whatsapp_no,$facebook,$x_link,$linkedin,$instagram);

       $Original_generate_vlink=$vcard->getOutput(); //do not remove


       //$generate_vlink=url('card/show/'.$id);

       $generate_vlink=url('card/show/'.md5($id));

       $Vlink= Digital_Vcard::where('id', $id)->update(['generated_vcard_link'=>$generate_vlink]);


        if($Vlink){
             return redirect()->route('admin.card')->with('success', 'Card details updated successfully');
        }else{
            return redirect()->route('admin.card')->with('failed', "Failed to update card details");
        }


        


        // return vcard as a string
        // return $vcard->getOutput();

        // return vcard as a download
        // return $vcard->download();
       
    }
}

