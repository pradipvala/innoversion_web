<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class City extends Model{
    use HasFactory;
    protected $table = 'all_city';

    protected $fillable = [
        'c_name',
        'state',
        'country_name',
        'status',
        'created_by',
        'created_at',
        'updated_by',
        'updated_at'
    ];


}
