<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slider extends Model
{
    use HasFactory, SoftDeletes;

    /*
     * save a slider
     *
     */

    public function saveSlider($request)
    {
        $slider = $this->findOrNew($request->slider_id);
        $slider->title = isset($request->title)&&!empty($request->title)?$request->title:NULL;
        $slider->link = isset($request->link)&&!empty($request->link)?$request->link:NULL;;
        $slider->video = "";
        $slider->description = isset($request->description)&&!empty($request->description)?$request->description:NULL;;
        $slider->status = '1';



        if ($request->hasFile('slider_image')) {

            // save image in public storage
            $local_url = 'slider/' . str_replace(' ', '-', $request->file('slider_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('slider_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $ext = pathinfo($request->file('slider_image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg') {
                $slider->type = 'image';
            } elseif ($ext === 'mp4' || $ext === 'x-m4v') {
                $slider->type = 'video';
            }

            $slider['image'] = $local_url;
        }

        $slider->save();
    }


    /*
    * role: Change App status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }


    /*
    * role: delete Slider

    * comments:
    */
    public function deleteSlider($request)
    {
        $sliderData = $this->find($request->id);
        if ($sliderData->image !== null) {
            \Storage::delete($sliderData->image);
        }
        $sliderData->delete();
    }
}
