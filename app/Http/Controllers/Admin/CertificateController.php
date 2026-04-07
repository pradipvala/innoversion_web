<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Certificate; 

class CertificateController extends Controller
{
     /*
        * Certificate: Display resources

        * comments:
    */

    public function all()
    {
        return view('admin.pages.certificate.list');

    }

    /*
        * Homepage : Listing Certificate

        * comments:
    */

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        $certificates = Certificate::orderBy('id','ASC');

        $search = $request['search']['value'];
            if(!empty($search)) {
                $certificates->where('image', "like", "%".$search."%")->orWhere('created_at', "like", "%" . $search . "%");
            }

        $count = (clone $certificates)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();
        

        $certificates->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $certificates = $certificates->get();


        foreach ($certificates as $key => $certificate) {

            $records['data'][] = [
                'id' => $key + 1,
                'image' => '<img src="' . (!empty($certificate->image) ?  \Storage::url($certificate->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="80" />',
                'created_at'    =>  \Carbon\Carbon::parse($certificate->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $certificate->id, 'routeName' => 'admin.certificate', 'status' => $certificate->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $certificate->id, 'routeName' => 'admin.certificate', 'view' => false])->render(),
            ];
    }


        return $records;
    }


    /*
    * role: create Certificate

    * comments:
    */
    public function create()
    {
        return view('admin.pages.certificate.add');
    }


    /*
    * role: Save Certificate

    * comments:
    */
    public function save(Request $request)
    {
        // image validation
        $validator =  \Validator::make($request->all(),[
           'certificate_image'    => 'mimes:jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

       $certificate = (new Certificate())->savecetificate($request);

        return redirect()->route('admin.certificates');
    }


    /*
    * role: Change Certificate status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Certificate())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit Certificate

    * comments:
    */
    public function edit(Certificate $certificate)
    {
        return view('admin.pages.certificate.add', compact('certificate'));
    }


    /*
    * role: Delete Certificate

    * comments:
    */
    public function delete(Request $request)
    {
        (new Certificate())->deleteCertificate($request);

        return 'true';
    }
}
