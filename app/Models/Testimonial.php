<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Testimonial extends Model
{
    use HasFactory, SoftDeletes;

    /*
    * role: Save Testimonial

    * comments:
    */
    public function savetestimonial($request)
    {
           
        $testimonial                 = $this->findOrNew($request->testimonial_id);
        $testimonial->name           = $request->name;
        $testimonial->description    = $request->description;
        $testimonial->status         = '1';

        $testimonial->save();

    }

    /*
    * role: Change App status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status         = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }


    /*
    * role: Delete delete Category

    * comments:
    */
    public function deletetestimonial($request)
    {

        $testimonialData = $this->find($request->id);
        $testimonialData->delete();
    }
}
