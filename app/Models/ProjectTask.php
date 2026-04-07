<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjectTask extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'project_task';
    protected $fillable = ['id', 'title', 'description', 'category', 'assign_to_user',
                                 'status', 'created_at', 'updated_at', 'deleted_at',
                                 'created_by','updated_by'];

    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }


}
