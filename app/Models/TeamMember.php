<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TeamMember extends Model
{
    use HasFactory, SoftDeletes;

    /*
    *  role : save member data
    *
    *

    */

    public function saveTeamMember($request)
    {
        // dd($request->all());
        $member             = $this->findOrNew($request->member_id);
        $member->name       = $request->name;
        $member->role       = $request->role;
        $member->status     = '1';

        if ($request->hasFile('member_image')) {
            
            // save image in public storage
            $local_url = 'member/' . str_replace(' ', '-', $request->file('member_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('member_image')));

            //Delete old image when update member image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $member['image'] = $local_url;
        }

        $member->save();
    }

    /*
    * role: Change member status.

    * comments:
    */
    public function changeStatus($request)
    {
    
        $status = $this->find($request->id);
        $status->status = $request->status;
        $status->save();
    }



    /*
    * role: delete member

    * comments:
    */
    public function deleteTeamMember($request)
    {
        $memberData = $this->find($request->id);
        if ($memberData->image !== null) {
            \Storage::delete($memberData->image);
        }
        $memberData->delete();
    }
}
