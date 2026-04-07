<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact1 extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table ='contacts1';
    
    
    public function saveContact($request)
    {
        $contact                = new Contact1;
        $contact->first_name    = isset($request->first_name)&&!empty($request->first_name)?$request->first_name:NULL;
        $contact->last_name     = isset($request->last_name)&&!empty($request->last_name)?$request->last_name:NULL;
        $contact->contact_email = isset($request->contact_email)&&!empty($request->contact_email)?$request->contact_email:NULL;
        $contact->phone_number  = isset($request->phone_number)&&!empty($request->phone_number)?$request->phone_number:NULL;
        $contact->company_name  = isset($request->company_name)&&!empty($request->company_name)?$request->company_name:NULL;
        $contact->product_id    = isset($request->product_id)&&!empty($request->product_id)?$request->product_id:NULL;
        $contact->service_id    = isset($request->service_id)&&!empty($request->service_id)?$request->service_id:NULL;
        $contact->message       = isset($request->message)&&!empty($request->message)?$request->message:NULL;
        $contact->country_code  = isset($request->countryCode)&&!empty($request->countryCode)?$request->countryCode:NULL;

        $contact->save();

    }

    public function deleteContact($request)
    {
        $contactUsData1 = $this->find($request->id);
        $contactUsData1->delete();
    }
}
