<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Certificate extends Model
{
    use HasFactory, SoftDeletes;

     /*
    *  role : save cetificate data
    
    *  comments:
    */

    public function savecetificate($request)
    {

        if ($request->hasFile('certificate_image')) {
            
            $cetificate                = $this->findOrNew($request->certificate_id);
            
            // save image in public storage
            $local_url = 'certificate/' . str_replace(' ', '-', $request->file('certificate_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('certificate_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $cetificate['image'] = $local_url;
        }

        $cetificate->save();

        return $cetificate;
    }

    /*
    * role: Change cetificate status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete cetificate

    * comments:
    */
    public function deleteCertificate($request)
    {
        $cetificateData = $this->find($request->id);
        if ($cetificateData->image !== null) {
            \Storage::delete($cetificateData->image);
        }
        $cetificateData->delete();
    }
    
}
