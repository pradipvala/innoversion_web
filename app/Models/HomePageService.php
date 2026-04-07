<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePageService extends Model
{
    use HasFactory;
    protected $table = 'home_page_service';
    protected $fillable = ['title','image','description'];

}
