<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductPoint extends Model
{
    use HasFactory;
    protected $table = 'product_point';
    public function homepageproduct()
    {
        return $this->belongsTo('App\Models\HomePageProduct');
    }
}
