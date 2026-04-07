<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;

class AboutUsController extends Controller
{
    /*
        * AboutUs: Display resources

        * comments:
    */
    public function all()
    {
        return view('admin.pages.aboutus.list');
    }

    /*
        * Homepage : Listing AboutUs

        * comments:
    */
    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));
        
        // get data from about_us table
        $aboutusdata = AboutUs::orderBy('id', 'ASC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $aboutusdata->where('title', "like", "%" . $search . "%")->orWhere('description', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $aboutusdata)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $aboutusdata->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $aboutusdata = $aboutusdata->get();

        foreach ($aboutusdata as $key => $aboutus) {
            $records['data'][] = [
                'id' => $key + 1,
                'name' => ucwords($aboutus->title),
                'description' => $aboutus->description,
                'image' => '<img src="' . (!empty($aboutus->image) ? \Storage::url($aboutus->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                'created_at' => \Carbon\Carbon::parse($aboutus->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $aboutus->id, 'routeName' => 'admin.aboutus', 'status' => $aboutus->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')
                    ->with(['id' => $aboutus->id, 'routeName' => 'admin.aboutus', 'view' => false])
                    ->render(),
            ];
        }
        return $records;
    }


    /*
    * role: create About uS

    * comments:
    */
    public function create()
    {
        return view('admin.pages.aboutus.add');
    }


    /*
    * role: Save About uS

    * comments:
    */
    public function save(Request $request)
    {
        // image validation
        $validator =  \Validator::make($request->all(),[
           'image'         => 'mimes:jpg,jpeg,png',
        ]);

         if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        
        (new AboutUs())->saveAboutus($request);

        return redirect()->route('admin.aboutus');
    }


    /*
    * role: Change About uS status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new AboutUs())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit About uS

    * comments:
    */
    public function edit(AboutUs $aboutus)
    {
        return view('admin.pages.aboutus.add', compact('aboutus'));
    }


    /*
    * role: Delete About uS

    * comments:
    */
    public function delete(Request $request)
    {
        (new AboutUs())->deleteAboutUs($request);

        return 'true';
    }
}
