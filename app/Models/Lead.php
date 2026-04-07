<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lead extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'lead_board';
    protected $fillable = ['id', 'business_name', 'country_id', 'state_id', 'city_id','file', 
                            'status', 'created_at', 'updated_at', 'deleted_at',
                            'created_by','updated_by'];

    public function deleteLeadBoard($id)
    {
        $leadBoardData = $this->find($id);
        $leadBoardData->delete();
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function state(){
        return $this->belongsTo(AllState::class);
    }
    public function city(){
        return $this->belongsTo(City::class);
    }
}
