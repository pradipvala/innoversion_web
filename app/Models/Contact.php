<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    use HasFactory, SoftDeletes;




    /*
    * role: save contact us

    * comments:
    */

    public function saveContact($request)
    {
        $contact                = new Contact;
        $contact->first_name    = $request->first_name;
        $contact->last_name     = $request->last_name;
        $contact->contact_email = $request->contact_email;
        $contact->phone_number  = $request->phone_number;
        $contact->company_name  = $request->company_name;
        $contact->message       = $request->message;
        $contact->country_code  = $request->countryCode;
        $contact->save();

    }


    /*
    * role: delete Contactus

    * comments:
    */
    public function deleteContact($request)
    {
        $contactUsData = $this->find($request->id);
        $contactUsData->delete();
    }

}
