<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AboutUs extends Model
{
    use HasFactory, SoftDeletes;

    /*
    * role: save about_us data
    *

    */

    public function saveAboutus($request)
    {
        $aboutus                = $this->findOrNew($request->aboutus_id);
        $aboutus->title         = $request->title;
        $aboutus->description   = $request->description;

        if ($request->hasFile('image')) {

            // save image in public storage
            $local_url = 'aboutus/' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('image')));

            // Delete old image when update About_us image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }
            $aboutus['image']   = $local_url;
        }

        $aboutus->status = '1';

        $aboutus->save();
    }


    /*
    * role: Change AboutUs status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete AboutUs

    * comments:
    */
    public function deleteAboutUs($request)
    {
        $aboutUsData = $this->find($request->id);
        $aboutUsData->delete();
    }
}
