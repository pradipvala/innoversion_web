<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Blogs extends Model
{
    use HasFactory,SoftDeletes;

    /*
        * Morph Relationship with image model
        *

        * comments:
    */
    public function blog_image()
    {
        
        return $this->morphMany('App\Models\Image','imageable');

    }

    /*
    *  role : save blogs data
    *
    *

    */

    public function saveBlog($request)
    {

        $blog                = $this->findOrNew($request->blog_id);
        $blog->title         = $request->title;
        $blog->description   = $request->description;
        $blog->blog_long_description   = $request->blog_long_description;
        $blog->category   = isset($request->category)&&!empty($request->category)?$request->category:NULL;
        $blog->status        = '1';

        $blog->save();

        return $blog;
    }

    /*
    * role: Change Blog status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete Blog

    * comments:
    */
    public function deleteBlog($request)
    {
        $blogData = $this->find($request->id);
        $blogData->delete();
    }
}
