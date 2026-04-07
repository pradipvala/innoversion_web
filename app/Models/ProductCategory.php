<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductCategory extends Model
{
    use HasFactory, SoftDeletes;

    /*
    * comment : get subcategory from category
    *
    * role :
    */

    public function sub_categories() {
        return $this->hasMany(static::class, 'parent_id');
    }

    
    /*
    * comment : get from subcategory
    *
    * role :
    */
    public function products() {
        return $this->hasMany(Product::class, 'category_id','id');
    }

     /*
        * Product: create a slug for Categories

        * comments:
    */
    public static function getSlugForCustom($name,$id = null)
    {

        $slug = strtolower(str_replace(" ", "-", $name));
        $count = ProductCategory::where('slug', 'like', $slug . '%');
        if (!empty($id)) {
            $count->where('id', '<>', $id);
        }
        $count = $count->count();

        return ($count > 0) ? ($slug . '-' . $count) : $slug;

    }

    /*
    * role: Save category

    * comments:
    */
   public function saveCategory($request)
   {

        $categories                 = $this->findOrNew($request->category_id);
        $categories->parent_id      = $request->parent_id;
        $categories->category_name  = $request->category_name;
        $categories->slug           = $this->getSlugForCustom($request->category_name, $categories->id);
        $categories->status         = '1';
        $categories->save();
    
   }

   /*
    * role: Change App status.

    * comments:
    */
   public function changeStatus($request)
   {
        $status         = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
   }

    /*
    * role: delete Category

    * comments:
    */
    public function deleteCategory($request)
    {

        $categoryData = $this->find($request->id);
        $categoryData->delete();

    }


    /*
    * Category: Listing Main category

    * comments:
    */
   public function allCategories($parentId)
   {

      return $this->where('parent_id',$parentId);

   }

   /*
    * Category: Get single category details using slug.

    * comments:
    */
   public function getCategory($categorySlug)
   {
       
       return $this->where('status','1')->where('slug',$categorySlug)->first();

   }
}
