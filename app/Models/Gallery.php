<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use HasFactory,SoftDeletes;

    /*
        * Morph Relationship with image model
        *

        * comments:
    */
    public function gallery_image()
    {
        
        return $this->morphMany('App\Models\Image','imageable');

    }

    /*
    *  role : save Gallery data
    
    *  comments:
    */

    public function saveGallery($request)
    {

        $gallery                = $this->findOrNew($request->gallery_id);
        $gallery->title         = $request->title;
        $gallery->status        = '1';

        $gallery->save();

        return $gallery;
    }

    /*
    * role: Change Gallery status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete Gallery

    * comments:
    */
    public function deleteGallery($request)
    {
        $gallaryData = $this->find($request->id);
        $gallaryData->delete();
    }

    
}
