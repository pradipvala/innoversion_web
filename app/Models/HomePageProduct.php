<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageProduct extends Model
{
    use HasFactory;
    protected $table='home_page_product';

    protected $fillable = ['name','description','image'];

    public function productpoints() {
        return $this->hasMany(ProductPoint::class, 'p_id','id');
    }
}
