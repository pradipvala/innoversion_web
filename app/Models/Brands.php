<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brands extends Model
{
    use HasFactory, SoftDeletes;


     /*
    *  role : save brand data
    
    *  comments:
    */

    public function savebrand($request)
    {

            
            $brand       = $this->findOrNew($request->brand_id);
            $brand->name = $request->name;
        if ($request->hasFile('brand_image')) {
            
            // save image in public storage
            $local_url = 'brand/' . str_replace(' ', '-', $request->file('brand_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('brand_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $brand['image'] = $local_url;
        }

        $brand->save();

        return $brand;
    }

    /*
    * role: Change brand status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete brand

    * comments:
    */
    public function deleteCertificate($request)
    {
        $brandData = $this->find($request->id);
        if ($brandData->image !== null) {
            \Storage::delete($brandData->image);
        }
        $brandData->delete();
    }
    
    
    public function deletebrand($request)
    {
        $brandData = $this->find($request->id);
        
        $brandData->delete();
    }
}
