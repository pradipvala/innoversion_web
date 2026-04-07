<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductB2c extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategoryB2c');
    }

    public function product_image1()
    {

        return $this->morphMany('App\Models\Image','imageable');

    }
    public function saveProduct($request)
    {
        // dd($request->all());
        $product                      = $this->findOrNew($request->product_id);

        if(!empty($request->subcategory_id)){

            $product->category_id         = $request->subcategory_id;

        }else{

           $product->category_id         = $request->category_id;

        }
        $product->title               = $request->title;
        $product->description         = $request->description;
        $product->brand_id            = $request->brand_id;

        $product->save();

        return $product;
    }
}
