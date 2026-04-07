<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class About_us_details extends Model
{
    use HasFactory, SoftDeletes;
    
    public function saveAbout_us_detail($request)
    {
        $about_us_detail = $this->findOrNew($request->id);
        
        $about_us_detail->title = isset($request->title)&&!empty($request->title)?$request->title:NULL;
        $about_us_detail->short_description = isset($request->short_description)&&!empty($request->short_description)?$request->short_description:NULL;
        $about_us_detail->description = isset($request->description)&&!empty($request->description)?$request->description:NULL;
        
        $about_us_detail->about_us_ceo_info = isset($request->about_us_ceo_info)&&!empty($request->about_us_ceo_info)?$request->about_us_ceo_info:NULL;
        
        $about_us_detail->ceo_name = isset($request->ceo_name)&&!empty($request->ceo_name)?$request->ceo_name:NULL;
        $about_us_detail->ceo_desg = isset($request->ceo_desg)&&!empty($request->ceo_desg)?$request->ceo_desg:NULL;
        
        $about_us_detail->mission_title = isset($request->mission_title)&&!empty($request->mission_title)?$request->mission_title:NULL;
        $about_us_detail->mission_description = isset($request->mission_description)&&!empty($request->mission_description)?$request->mission_description:NULL;
        
        $about_us_detail->vision_title = isset($request->vision_title)&&!empty($request->vision_title)?$request->vision_title:NULL;
        $about_us_detail->vision_description = isset($request->vision_description)&&!empty($request->vision_description)?$request->vision_description:NULL;
        
        
         $about_us_detail->status = '1';
        
        
        if ($request->hasFile('about_us_ceo_image')) {

            // save image in public storage
            $local_url = 'about_us_images/' . str_replace(' ', '-', $request->file('about_us_ceo_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('about_us_ceo_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $ext = pathinfo($request->file('about_us_ceo_image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext == 'gif') {
                $image_type=$ext;
            } 

            $about_us_detail['about_us_ceo_image'] = $local_url;
        }
        
        
        if ($request->hasFile('mission_image')) {

            // save image in public storage
            $local_url = 'about_us_images/' . str_replace(' ', '-', $request->file('mission_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('mission_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $ext = pathinfo($request->file('mission_image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext == 'gif') {
                $image_type=$ext;
            } 

            $about_us_detail['mission_image'] = $local_url;
        }
        
        
        if ($request->hasFile('vision_image')) {

            // save image in public storage
            $local_url = 'about_us_images/' . str_replace(' ', '-', $request->file('vision_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('vision_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $ext = pathinfo($request->file('vision_image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext == 'gif') {
                 $image_type=$ext;
            } 

            $about_us_detail['vision_image'] = $local_url;
        }
        
        
    //   dd($about_us_detail);

        $about_us_detail->save();
    }


    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }


    public function deleteAboutUsDetail($request)
    {
        $AboutUsDetailData = $this->find($request->id);
        
        $AboutUsDetailData->delete();
    }
}