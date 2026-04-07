<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Services_1 extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'services_1';

    protected $fillable = [
        'id',
        'title',
        'sub_title',
        'img',
        'description',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];


    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }


}

?>
