<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruitment extends Model
{
    use HasFactory,SoftDeletes;

     /*
    * role: save Recruitment data
    *

    */
    public function saveRecruitment($request)
    {
        $recruitment                = $this->findOrNew($request->recruitment_id);
        $recruitment->title         = $request->title;
        $recruitment->place         = $request->place;
        $recruitment->description   = $request->description;
        $recruitment->status        = '1';
        $recruitment->save();
    }


    /*
    * role: Change Recruitment status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }


    public function recruitus() {
        return $this->hasMany(Recruitu::class, 'recruitment_id','id');
    }



    /*
    * role: delete Recruitment

    * comments:
    */
    public function deleteRecruitment($request)
    {
        $recruitmentData = $this->find($request->id);
        $recruitmentData->delete();
    }
}
