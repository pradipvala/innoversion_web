<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Contact1;
use App\Models\ContactUsFile;
use App\Models\Product;
use App\Models\Services;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    
    /*
        * contact: Display resources

        * comments:
    */
   public function all()
   {
    
        return view('admin.pages.contactus.list');

   }

public function index()
   {
    return view('admin.pages.contactus.list1');

   }
   /*
        * Homepage : Listing contact

        * comments:
    */
   public function listing(Request $request)
   {

        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

       $contacts = Contact::orderBy('id','DESC');

       $search = $request['search']['value'];
            if(!empty($search)) {
                $contacts->where('first_name', "like", "%".$search."%")
                        ->orWhere('last_name', 'like' ,"%" .$search. "%")
                        ->orWhere('contact_email', 'like', '%' .$search. "%")
                        ->orWhere('phone_number', 'like', '%' .$search. "%")
                        ->orWhere('company_name', 'like', '%' .$search. "%")
                        ->orWhere('message', 'like', '%' .$search. "%")
                        ->orWhere('created_at', 'like', '%' .$search. "%");
                    }

        $count = (clone $contacts)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();
        
        

        // $contacts->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);
        
        $contacts->limit($limit)->orderBy($sort_column, $sort_order);

        $contacts = $contacts->get();

       foreach ($contacts as $key => $contact) {

            $records['data'][] = [
                'id' 			=> $key+1,
                'first_name'	=> $contact->first_name,
                'last_name' 	=> $contact->last_name,
                'contact_email'	=> $contact->contact_email,
                'phone_number'  => $contact->phone_number,
                'company_name'	=> $contact->company_name,
                'message'		=> $contact->message,
                'created_at'	=> $contact->created_at->format('d-m-Y'),  
          		'action'=> view('admin.shared.action')->with(['id' => $contact->id, 'routeName' => 'admin.contact','view' => false, 'edit' => false])->render(),
          		
            ];
       }
       return $records;

   }
   
   
   public function listing1(Request $request)
   {

        // Dtf filters for datatable pagintion
        extract($this->DTFilters($request->all()));

       $contacts = Contact1::orderBy('id','DESC');



       $search = $request['search']['value'];
            if(!empty($search)) {
                $contacts->where('first_name', "like", "%".$search."%")
                        ->orWhere('last_name', 'like' ,"%" .$search. "%")
                        ->orWhere('contact_email', 'like', '%' .$search. "%")
                        ->orWhere('phone_number', 'like', '%' .$search. "%")
                        ->orWhere('company_name', 'like', '%' .$search. "%")
                        ->orWhere('message', 'like', '%' .$search. "%")
                        ->orWhere('created_at', 'like', '%' .$search. "%");
                    }

        $count = (clone $contacts)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();

        // $contacts->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);
        
         $contacts->limit($limit)->orderBy($sort_column, $sort_order);

        $contacts = $contacts->get();
        
     

       foreach ($contacts as $key => $contact) {  

        

        if(isset($contact->product_id) && !empty($contact->product_id)){

            $products = Product::where(['status'=>'1','id'=>$contact->product_id])->first();
            $product_name=isset($products->title)&&!empty($products->title)?$products->title:NULL;
        }else{
            $product_name = '';
        }       


        if(isset($contact->service_id) && !empty($contact->service_id)){

            $services = Services::where(['status'=>'1','id'=>$contact->service_id])->first();
            $service_name=isset($services->title)&&!empty($services->title)?$services->title:NULL;
        }else{
            $service_name ='';
        }


        
            
            $records['data'][] = [
                'id' 			=> $key+1,
                'first_name'	=> $contact->first_name,
                'last_name' 	=> $contact->last_name,
                'contact_email'	=> $contact->contact_email,
                'country_code'  => $contact->country_code,
                'phone_number'  => $contact->phone_number,
                'product_name'  => isset($product_name)&&!empty($product_name)?$product_name:NULL,
                'service_name'  => isset($service_name)&&!empty($service_name)?$service_name:NULL,
                'company_name'	=> $contact->company_name,
                'message'		=> isset($contact->message)&&!empty($contact->message)?$contact->message:'-',
                'action'=> view('admin.shared.action')->with(['id' => $contact->id, 'routeName' => 'admin.contactus1','view' => false, 'edit' => false])->render(),
                

            ];
       }
      
       return $records;

   }
   
    public function contact_us_file_list()
   {
        $file=ContactUsFile::first();
        return view('admin.pages.contact_file_us.index')->with(['file'=>$file]);
   }
   
   public function contact_us_file_save(Request $request, $id)
{
    $file1 = ContactUsFile::where('id', '=', $id)->first();

    $validator = Validator::make($request->all(), [
        'file' => 'required|file|mimes:pdf,doc,docx|max:10240',
    ], [
        'file.required' => 'Please upload your CV.',
        'file.file' => 'The CV must be a file.',
        'file.mimes' => 'The CV must be a file of type: pdf, doc, docx.',
        'file.max' => 'The CV must not be larger than 2MB.',
    ]);

    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    try {
        if ($request->hasFile('file')) {
            $imagePath = $request->file('file')->store('contact', 'public');
            $file1->file = $imagePath;
        }

        $file1->save();
        return redirect()->route('admin.contact.file.list')->with('success', 'CV uploaded successfully.');
    } catch (\Exception $e) {
        Log::error('File upload failed: ' . $e->getMessage());
        return redirect()->back()->with('failure', 'File upload failed. Please try again.');
    }
}


    /*
    * role: Delete Contact

    * comments:
    */
    public function delete(Request $request)
    {
        
        (new Contact())->deleteContact($request);

        return 'true';
    }
    
    public function delete1(Request $request)
    {
        
        (new Contact1())->deleteContact($request);

        return 'true';
    }
    
    
    
    public function contact_us_file_edit($id)
    {
        $file=ContactUsFile::where('id','=',$id)->first();
        return view('admin.pages.contact_file_us.edit')->with(['file'=>$file]);
    }
}
