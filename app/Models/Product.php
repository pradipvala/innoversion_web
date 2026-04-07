<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory,SoftDeletes;

    /*
        * Morph Relationship with image model
        *

        * comments:
    */
    public function product_image()
    {
        
        return $this->morphMany('App\Models\Image','imageable');

    }


    /*
        * belongs tp Relationship with category model
        *

        * comments:
    */
    public function category()
    {
        return $this->belongsTo('App\Models\ProductCategory');
    }

     /*
        * belongs tp Relationship with brand model
        *

        * comments:
    */
    public function brand()
    {
        return $this->belongsTo('App\Models\Brands');
    }
    public function brands($product_id)
    {
        return BrandProduct::where('product_id',$product_id)->pluck('image')->toArray();
    }



    /*
    *  role : save product data
    *
    *

    */

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
    

    /*
    * role: Change product status.

    * comments:
    */
    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete product

    * comments:
    */
    public function deleteProduct($request)
    {
        $productData = $this->find($request->id);
        // if ($productData->image !== null) {
        //     \Storage::delete($productData->image);
        // }
        $productData->delete();
    }

}
