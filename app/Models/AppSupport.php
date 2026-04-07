<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AppSupport extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'app_support';
    protected $fillable = ['id', 'title', 'description', 'technologies', 'website',
                            'phone_no', 'email', 'time_to_connect', 'connection_medium',
                            'remark', 'status', 'created_at', 'updated_at', 'deleted_at',
                            'created_by','updated_by'];

    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    public function deleteAppSupport($id)
    {
        $webSupportData = $this->find($id);
        $webSupportData->delete();
    }
}
