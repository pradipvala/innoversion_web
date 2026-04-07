<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partner;

class PartnerController extends Controller
{
     /*
        * partner: Display resources

        * comments:
    */

    public function all()
    {
        return view('admin.pages.partner.list');

    }

    /*
        * Homepage : Listing partner

        * comments:
    */

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        $partners = Partner::orderBy('id','ASC');

        $search = $request['search']['value'];
            if(!empty($search)) {
                $partners->where('name', "like", "%".$search."%");
            }

        $count = (clone $partners)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();
        

        $partners->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $partners = $partners->get();


        foreach ($partners as $key => $partner) {

            $records['data'][] = [
                'id' => $key + 1,
                'image' => '<img src="' . (!empty($partner->image) ?  \Storage::url($partner->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="80" />',
                'created_at'    =>  \Carbon\Carbon::parse($partner->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $partner->id, 'routeName' => 'admin.partner', 'status' => $partner->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $partner->id, 'routeName' => 'admin.partner', 'view' => false])->render(),
            ];
    }


        return $records;
    }


    /*
    * role: create partner

    * comments:
    */
    public function create()
    {
        return view('admin.pages.partner.add');
    }


    /*
    * role: Save partner

    * comments:
    */
    public function save(Request $request)
    {
        // image validation
        $validator =  \Validator::make($request->all(),[
           'partner_image'    => 'mimes:jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

       $partner = (new Partner())->savepartner($request);

        return redirect()->route('admin.partners');
    }


    /*
    * role: Change partner status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Partner())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit partner

    * comments:
    */
    public function edit(Partner $partner)
    {
        return view('admin.pages.partner.add', compact('partner'));
    }


    /*
    * role: Delete partner

    * comments:
    */
    public function delete(Request $request)
    {
        (new Partner())->deletepartner($request);

        return 'true';
    }
}
