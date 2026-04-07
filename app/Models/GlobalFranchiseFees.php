<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GlobalFranchiseFees extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'global_franchise_fees';
    protected $fillable = ['id','global_franchise_fees','status','deleted_at','created_at','updated_at',
                            'created_by','updated_by'];

    public function changeStatus($request)
    {
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    public function deleteGlobalFranchiseFees($request)
    {
        $franchiseFees = $this->find($request->id);
        $franchiseFees->delete();
    }
}
