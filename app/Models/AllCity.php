<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\AllState;
use DB;

class AllCity extends Model{
    use HasFactory;
    protected $table = 'all_city';

    protected $fillable = [
        'c_name',
        'state_id',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];
    public function state(){
        return $this->belongsTo(AllState::class,'state_id','id');
    }
    
}
