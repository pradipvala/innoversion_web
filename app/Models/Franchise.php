<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Franchise extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'franchise';
    protected $fillable = ['id','business_name','franchise_name','gst_no','contact_no','email','country','state','city',
                            'contact_person','pan_no','aadhaar_no','pan_img','aadhaar_img','gst_certificate',
                            'franchise_code','approval_status','status','deleted_at','created_at','updated_at',
                            'created_by','updated_by'];

    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    public function deleteFranchise($request)
    {
        $franchiseData = $this->find($request->id);
        $franchiseData->delete();
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function state(){
        return $this->belongsTo(AllState::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }

    
}
