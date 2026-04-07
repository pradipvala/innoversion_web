<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Projects extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'projects';

    protected $fillable = ['id', 'title', ' status','description', 'project_image', 
                                 'deleted_at', 'created_at', 'updated_at'];
    
    

    

    public function saveProject($request)
    {

        $project                = $this->findOrNew($request->project_id);
        $project->title         = $request->title;
        $project->status        = '1';
        $project->description   = $request->description;
        $project->save();

        return $project;
    }

    public function project_image()
    {

        return $this->morphMany('App\Models\Image','imageable');

    }

    
    public function changeStatus($request)
    {

        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    public function deleteProject($request)
    {
        $projectData = $this->find($request->id);
        // if ($productData->image !== null) {
        //     \Storage::delete($productData->image);
        // }
        $projectData->delete();
    }
}
