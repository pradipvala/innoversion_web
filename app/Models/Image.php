<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Image extends Model
{
    use HasFactory;


     /*

     * Morph images.

    */
    public function imageble()
    {

        return $this->morphTo();
    }

    /*
    * role: Save Product Image

    * comments:
    */
    public function saveProductimage($request, $type, $product)
    {
        if ($request->product_image !== null) {
            foreach ($request->file('product_image') as $key => $images) {
                $productimage = new Image;

                // Generate a unique filename using timestamp
                $timestamp = now()->timestamp;
                $filename = $timestamp . '_' . str_replace(' ', '-', $images->getClientOriginalName());

                $local_url = 'product/' . $filename;

                // Store the file with the unique filename
                \Storage::disk('public')->put($local_url, file_get_contents($images));

                $productimage->imageable_type = $type;
                $productimage->imageable_id = $product->id;
                $productimage['image'] = $local_url;
                $productimage->save();
            }

            return $productimage;
        }
    }

    /*
    * role: Save project image

    * comments:
    */

    public function saveProjectimage($request,$type,$project)
    {

        if($request->hasFile('project_image'))
        {

                $projectimage                   = $this->findOrNew($request->projectimage_id);

                $local_url                       = 'project/'.str_replace(' ','-',$request->file('project_image')->getClientOriginalName());
                \Storage::disk('public')->put($local_url, file_get_contents($request->file('project_image')));

                $projectimage->imageable_type    = $type;
                $projectimage->imageable_id      = $project->id;

                 //Delete old image when update the form application image.
                if($request->old_image !== null){
                    \Storage::delete($request->old_image);
                }

                $projectimage['image']          = $local_url;
                $projectimage->save();

                return $projectimage;
        }


    }

    /*
    * role: Save gallery image

    * comments:
    */

    public function saveGalleryimage($request,$type,$gallery)
    {

      if($request->hasFile('gallery_image'))
        {

                $galleryimage                   = $this->findOrNew($request->galleryimage_id);

                $local_url                       = 'gallery/'.str_replace(' ','-',$request->file('gallery_image')->getClientOriginalName());
                \Storage::disk('public')->put($local_url, file_get_contents($request->file('gallery_image')));

                $galleryimage->imageable_type    = $type;
                $galleryimage->imageable_id      = $gallery->id;

                 //Delete old image when update the form application image.
                if($request->old_image !== null){
                    \Storage::delete($request->old_image);
                }

                $galleryimage['image']          = $local_url;
                $galleryimage->save();

                return $galleryimage;
        }


    }

    /*
    * role: Save BLog image

    * comments:
    */

    public function saveBlogimage($request,$type,$blog)
    {

      if($request->hasFile('blog_image'))
        {

                $blogimage                   = $this->findOrNew($request->blogimage_id);

                $local_url                   = 'blog/'.str_replace(' ','-',$request->file('blog_image')->getClientOriginalName());
                \Storage::disk('public')->put($local_url, file_get_contents($request->file('blog_image')));

                $blogimage->imageable_type    = $type;
                $blogimage->imageable_id      = $blog->id;

                 //Delete old image when update the form application image.
                if($request->old_image !== null){
                    \Storage::delete($request->old_image);
                }

                $blogimage['image']          = $local_url;
                $blogimage->save();

                return $blogimage;
        }


    }

     /*
    * role: Delete porduct in Add form

    * comments:
    */
   public function deleteimage($productId)
   {

       $productId = $this->find($productId);
        if($productId->image !== ''){
            \Storage::delete($productId->image);
        }
        $productId->delete();

   }


}
