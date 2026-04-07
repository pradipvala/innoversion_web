<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Partner extends Model
{
    use HasFactory, SoftDeletes;

     /*
    *  role : save partner data
    
    *  comments:
    */

    public function savepartner($request)
    {

        if ($request->hasFile('partner_image')) {
            
            $partner       = $this->findOrNew($request->partner_id);
            
            // save image in public storage
            $local_url = 'partner/' . str_replace(' ', '-', $request->file('partner_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('partner_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $partner['image'] = $local_url;
        }

        $partner->save();

        return $partner;
    }

    /*
    * role: Change partner status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete partner

    * comments:
    */
    public function deleteCertificate($request)
    {
        $partnerData = $this->find($request->id);
        if ($partnerData->image !== null) {
            \Storage::delete($partnerData->image);
        }
        $partnerData->delete();
    }
    
    public function deletepartner($request)
    {
        $partnerData = $this->find($request->id);
       
        $partnerData->delete();
    }
}
