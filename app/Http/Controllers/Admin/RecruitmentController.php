<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Recruitment;
use App\Models\Recruitu;

class RecruitmentController extends Controller
{
    /*
        * Recruitment: Display resources

        * comments:
    */
    public function all()
    {
        return view('admin.pages.recruitment.list');
    }

    /*
        * Homepage : Listing Recruitment

        * comments:
    */
    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion
        extract($this->DTFilters($request->all()));

        // get data from Service table
        $recruitments = Recruitment::orderBy('id', 'ASC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $recruitments->where('title', "like", "%" . $search . "%")->orWhere('place', "like", "%" . $search . "%")->orWhere('description', "like", "%" . $search . "%")
            ->orWhere('created_at', "like", "%" . $search . "%");
        }
        
        
        

        $count = (clone $recruitments)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $recruitments->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $recruitments = $recruitments->get();

        foreach ($recruitments as $key => $recruitment) {
            $records['data'][] = [
                'id' => $key + 1,
                'name' => ucwords($recruitment->title),
                'place' => $recruitment->place,
                'description' => $recruitment->description,
                'created_at' => \Carbon\Carbon::parse($recruitment->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $recruitment->id, 'routeName' => 'admin.recruitment', 'status' => $recruitment->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $recruitment->id, 'routeName' => 'admin.recruitment', 'view' => false])->render(),
            ];
        }
        return $records;
    }


    /*
    * role: create Recruitment

    * comments:
    */
    public function create()
    {
        return view('admin.pages.recruitment.add');
    }


    /*
    * role: Save Recruitment

    * comments:
    */
    public function save(Request $request)
    {

        (new Recruitment())->saveRecruitment($request);

        return redirect()->route('admin.recruitments');
    }


    /*
    * role: Change Recruitment status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Recruitment())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit Recruitment

    * comments:
    */
    public function edit(Recruitment $recruitment)
    {
        return view('admin.pages.recruitment.add', compact('recruitment'));
    }


    /*
    * role: Delete Recruitment

    * comments:
    */
    public function delete(Request $request)
    {
        (new Recruitu())->deleteRecruitment($request);

       // return 'true';
        return response()->json(['status'=>true,'message'=> 'Successfully deleted!!']);
        
        
        
      
    }

    public function recruitu()
    {
        $recruitus = Recruitu::all();
        return view('admin.pages.recruitment.recruitu_list')->with(['recruitus'=>$recruitus]);
    }


}
