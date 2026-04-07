<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services;

class ServiceController extends Controller
{
    /*
        * Service: Display resources

        * comments:
    */
    public function all()
    {
        return view('admin.pages.service.list');
    }

    /*
        * Homepage : Listing Service

        * comments:
    */
    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        // get data from Service table
        $services = Services::orderBy('id', 'ASC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $services->where('title', "like", "%" . $search . "%")->orWhere('description', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $services)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $services->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $services = $services->get();

        foreach ($services as $key => $service) {
            $records['data'][] = [
                'id' => $key + 1,
                'name' => ucwords($service->title),
                'description' => $service->description,
                'image' => '<img src="' . (!empty($service->image) ? \Storage::url($service->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                'created_at' => \Carbon\Carbon::parse($service->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $service->id, 'routeName' => 'admin.service', 'status' => $service->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $service->id, 'routeName' => 'admin.service', 'view' => false])->render(),
            ];
        }
        return $records;
    }


    /*
    * role: create service

    * comments:
    */
    public function create()
    {
        return view('admin.pages.service.add');
    }


    /*
    * role: Save service

    * comments:
    */
    public function save(Request $request)
    {
         // image validation
        $validator =  \Validator::make($request->all(),[
           'image'    => 'mimes:jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
        
        (new Services())->saveService($request);

        return redirect()->route('admin.services');
    }


    /*
    * role: Change Service status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Services())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit Service

    * comments:
    */
    public function edit(Services $service)
    {
        return view('admin.pages.service.add', compact('service'));
    }


    /*
    * role: Delete Service 

    * comments:
    */
    public function delete(Request $request)
    {
        (new Services())->deleteService($request);

        return 'true';
    }
}
