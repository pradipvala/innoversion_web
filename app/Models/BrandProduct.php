<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BrandProduct extends Model
{
    use HasFactory;
    protected $fillable = ['product_id','brand_id','title','description','image'];
    public function brand()
    {
        return $this->belongsTo('App\Models\Brands');
    }

    public function Product()
    {
        return $this->belongsTo('App\Models\products');
    }

}
