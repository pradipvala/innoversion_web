<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Milestone extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'milestone';
    protected $fillable = ['id', 'project_task_id','milestone_description','status', 'task_status',
                                 'created_at', 'updated_at', 'deleted_at',
                                 'created_by','updated_by'];

    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    public function deleteMilestone($id)
    {
        $milestoneData = $this->find($id);
        $milestoneData->delete();
    }

    public function project_task(){
        return $this->belongsTo(ProjectTask::class,'project_task_id','id');
    }
}
