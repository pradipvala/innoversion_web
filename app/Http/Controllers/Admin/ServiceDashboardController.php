<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Services;
use App\Models\Service_Contacts;

use App\Models\Contact1;

use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;
use DB;


class ServiceDashboardController extends Controller
{

    public function __construct(){
        $this->middleware('permission:show-service-create', ['only' => ['create']]);
        $this->middleware('permission:show-service-edit', ['only' => ['edit']]);
        $this->middleware('permission:show-service-view', ['only' => ['view']]);
        $this->middleware('permission:show-service-delete', ['only' => ['delete']]);
    }


    public function index(Request $request)
    {

        $services = Services::where('status','1')->get();

        return view('admin.pages.innoversion_dashboard.service_dashboard', compact('services'));

    }

    public function show(Request $request,$id)
    {
        $services_data = Services::where(['id'=>$id, 'status' => '1'])->get();

        $id=isset($id)&&!empty($id)?$id:NULL;

        return view('admin.pages.innoversion_dashboard.service_details', compact('services_data','id'));

    }

    public function save_services_contacts(Request $request)
    {

        // dd($request);

        
        (new Contact1())->saveContact($request);
        
        $details = [
            'name' => $request->first_name,
            'email' => $request->contact_email,
            'phone_number'  => $request->phone_number,
            'contact_email' => $request->contact_email,
        ];
        
        $email=isset($details['email'])&&!empty($details['email'])?$details['email']:NULL;

        Mail::to($email)->send(new ContactFormMail($details));


        return redirect()->back()->with('success', 'Contact details Submited successfully');
    }
}

