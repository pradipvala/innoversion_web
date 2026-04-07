<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brands;

class BrandController extends Controller
{
    /*
        * brand: Display resources

        * comments:
    */

    public function all()
    {
        return view('admin.pages.brand.list');

    }

    /*
        * Homepage : Listing brand

        * comments:
    */

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        $brands = Brands::orderBy('id','ASC');

        $search = $request['search']['value'];
            if(!empty($search)) {
                $brands->where('name', "like", "%".$search."%")->orWhere('created_at', "like", "%".$search."%");
            }

        $count = (clone $brands)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();
        

        $brands->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $brands = $brands->get();


        foreach ($brands as $key => $brand) {

            $records['data'][] = [
                'id' => $key + 1,
                'name' => $brand->name,
                'image' => '<img src="' . (!empty($brand->image) ?  \Storage::url($brand->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="80" />',
                'created_at'    =>  \Carbon\Carbon::parse($brand->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $brand->id, 'routeName' => 'admin.brand', 'status' => $brand->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $brand->id, 'routeName' => 'admin.brand', 'view' => false])->render(),
            ];
    }


        return $records;
    }


    /*
    * role: create brand

    * comments:
    */
    public function create()
    {
        return view('admin.pages.brand.add');
    }


    /*
    * role: Save brand

    * comments:
    */
    public function save(Request $request)
    {
        // image validation
        $validator =  \Validator::make($request->all(),[
           'brand_image'    => 'mimes:jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

       $brand = (new Brands())->savebrand($request);

        return redirect()->route('admin.brands');
    }


    /*
    * role: Change brand status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Brands())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit brand

    * comments:
    */
    public function edit(Brands $brand)
    {
        return view('admin.pages.brand.add', compact('brand'));
    }


    /*
    * role: Delete brand

    * comments:
    */
    public function delete(Request $request)
    {
        (new Brands())->deletebrand($request);

        return 'true';
    }
}
