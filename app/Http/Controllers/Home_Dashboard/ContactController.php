<?php

namespace App\Http\Controllers\Home_Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Contact1;

use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function __construct(){
        $this->middleware('permission:contact-us-create', ['only' => ['create']]);
        $this->middleware('permission:contact-us-edit', ['only' => ['edit']]);
        $this->middleware('permission:contact-us-view', ['only' => ['view']]);
        $this->middleware('permission:contact-us-delete', ['only' => ['delete']]);
    }


    public function index()
    {
        return view('frontend.contactus.list1');
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
                        ->orWhere('country_code', 'like', '%' .$search. "%")
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
                'first_name'	=> isset($contact->first_name)&&!empty($contact->first_name)?$contact->first_name:NULL,
                'last_name' 	=> isset($contact->last_name)&&!empty($contact->last_name)?$contact->last_name:NULL,
                'contact_email'	=> isset($contact->contact_email)&&!empty($contact->contact_email)?$contact->contact_email:NULL, 
                'country_code'  => isset($contact->country_code)&&!empty($contact->country_code)?$contact->country_code:NULL,
                'phone_number'  => isset($contact->phone_number)&&!empty($contact->phone_number)?$contact->phone_number:NULL,  
                'company_name'	=> isset($contact->company_name)&&!empty($contact->company_name)?$contact->company_name:NULL,  
                'message'		=> isset($contact->message)&&!empty($contact->message)?$contact->message:'-',
                'action'=> view('frontend.shared.action')->with(['id' => $contact->id, 'routeName' => 'contactus1','view' => false, 'edit' => false])->render(),
            ];
       }
      
       return $records;

   }
   
    public function delete1(Request $request)
    {
        
        (new Contact1())->deleteContact($request);

        return 'true';
    }




    
    
    

}
