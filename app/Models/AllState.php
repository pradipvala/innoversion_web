<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use DB;

class AllState extends Model{
    use HasFactory;
    protected $table = 'all_state';
    
    protected $fillable = [
        'state',
        'country_name',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];

    
    public function country(){
        return $this->belongsTo(Country::class,'country_id','id');
    }
}
