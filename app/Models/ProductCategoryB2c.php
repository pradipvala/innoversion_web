<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategoryB2c extends Model
{
    use HasFactory;
    protected $table = 'product_categories_b2cs';
    public function allCategories($parentId)
    {

       return $this->where('parent_id',$parentId);

    }
    public function products() {
        return $this->hasMany(ProductB2c::class, 'category_id','id');
    }
    public function parentCategory()
    {
        return $this->belongsTo(ProductCategoryB2c::class, 'parent_id');
    }
    public function childCategories()
    {
        return $this->hasMany(ProductCategoryB2c::class, 'parent_id');
    }
    public function sub_categories() {
        return $this->hasMany(static::class, 'parent_id');
    }
}
