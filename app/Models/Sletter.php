<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Sletter extends Model
{
    use HasFactory,SoftDeletes;



     /*
    * role: Change Sletter status.

    * comments:
    */

     public function saveSletter($request)
     {
        
        $sletter = new Sletter;
        $sletter->email = $request->email;

        $sletter->save();

     }


    /*
    * role: Change Sletter status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }

    /*
    * role: delete Sletter

    * comments:
    */
    public function deleteSletter($request)
    {
        $sletterData = $this->find($request->id);
        $sletterData->delete();
    }
}
