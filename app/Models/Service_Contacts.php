<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service_Contacts extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='service_contacts';

    public function saveServiceContacts($request)
    {
        $contact                = new Service_contacts;
        $contact->first_name    = $request->first_name;
        $contact->last_name     = $request->last_name;
        $contact->contact_email = $request->contact_email;
        $contact->countryCode  = $request->countryCode;
        $contact->phone_number  = $request->phone_number;
        $contact->save();

    }

    public function deleteServiceContacts($request)
    {
        $serviceContactData = $this->find($request->id);
        $serviceContactData->delete();
    }
}
