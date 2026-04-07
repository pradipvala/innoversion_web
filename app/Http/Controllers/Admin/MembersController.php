<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TeamMember;

class MembersController extends Controller
{
     /*
        * TeamMember: Display resources

        * comments:
    */
    public function all()
    {
        return view('admin.pages.team_member.list');
    }

    /*
        * Homepage : Listing TeamMember

        * comments:
    */
    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion
        extract($this->DTFilters($request->all()));

        // get data from TeamMember table
        $teammembers = TeamMember::orderBy('id', 'ASC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $teammembers->where('name', "like", "%" . $search . "%")
                        ->orWhere('role', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $teammembers)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $teammembers->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $teammembers = $teammembers->get();

        foreach ($teammembers as $key => $teammember) {

                $records['data'][] = [
                    'id' => $key + 1,
                    'name' => ucwords($teammember->name),
                    'role' => ucwords($teammember->role),
                    'image' => '<img src="' . (!empty($teammember->image) ? \Storage::url($teammember->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    'created_at' => \Carbon\Carbon::parse($teammember->created_at)->format('d-m-Y'),
                    'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $teammember->id, 'routeName' => 'admin.member', 'status' => $teammember->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                    'action' => view('admin.shared.action')->with(['id' => $teammember->id, 'routeName' => 'admin.member', 'view' => false])->render(),
                ];
        }
        return $records;
    }


    /*
    * role: create TeamMember

    * comments:
    */
    public function create()
    {
        return view('admin.pages.team_member.add');
    }


    /*
    * role: Save TeamMember

    * comments:
    */
    public function save(Request $request)
    {
         // image validation
        $validator =  \Validator::make($request->all(),[
           'member_image'    => 'mimes:jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

       $TeamMember = (new TeamMember())->saveTeamMember($request);

        return redirect()->route('admin.members');
    }


    /*
    * role: Change TeamMember status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new TeamMember())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit TeamMember

    * comments:
    */
    public function edit(TeamMember $member)
    {
        return view('admin.pages.team_member.add', compact('member'));
    }


    /*
    * role: Delete TeamMember

    * comments:
    */
    public function delete(Request $request)
    {
        (new TeamMember())->deleteTeamMember($request);

        return 'true';
    }
}
