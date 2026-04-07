<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model{
    use HasFactory;
    protected $table = 'country';

    protected $fillable = [
        'id',
        'country_name',
        'phonecode',
        'code',
        'status',
        'created_at',
        'updated_at',
        'created_by',
        'updated_by'
    ];
}
