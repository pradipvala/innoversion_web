<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recruitu extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = ['first_name','last_name','recruitment_id','email','phone','cv'] ;

    public function Recruitment()
    {
        return $this->belongsTo('App\Models\Recruitment');
    }
    
    public function deleteRecruitment($request)
    {
        
       
        $recruitmentData = $this->find($request->id);
        $recruitmentData->delete();
    }
}
