<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\Image; 

class GalleryController extends Controller
{
   
     /*
        * Gallery: Display resources

        * comments:
    */

    public function all()
    {
        return view('admin.pages.gallery.list');

    }

    /*
        * Homepage : Listing Gallery

        * comments:
    */

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        $galleries = Gallery::orderBy('id','ASC');

        $search = $request['search']['value'];
            if(!empty($search)) {
                $galleries->where('name', "like", "%".$search."%");
            }

        $count = (clone $galleries)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();
        

        $galleries->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $galleries = $galleries->get();


        foreach ($galleries as $key => $gallery) {

             foreach ($gallery->gallery_image as $key => $image) {

            $records['data'][] = [
                'id' => $key + 1,
                'title' => ucwords($gallery->title),
                'image' => '<img src="' . (!empty($image->image) ?  \Storage::url($image->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="80" />',
                'created_at'    =>  \Carbon\Carbon::parse($gallery->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $gallery->id, 'routeName' => 'admin.gallery', 'status' => $gallery->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $gallery->id, 'routeName' => 'admin.gallery', 'view' => false])->render(),
            ];
        }
    }


        return $records;
    }


    /*
    * role: create Gallery

    * comments:
    */
    public function create()
    {
        return view('admin.pages.gallery.add');
    }


    /*
    * role: Save Gallery

    * comments:
    */
    public function save(Request $request)
    {
        // image validation
        $validator =  \Validator::make($request->all(),[
           'gallery_image'    => 'mimes:jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

       $gallery = (new Gallery())->saveGallery($request);
 
        (new Image())->saveGalleryimage($request,'App\Models\Gallery',$gallery);

        return redirect()->route('admin.galleries');
    }


    /*
    * role: Change Gallery status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Gallery())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit Gallery

    * comments:
    */
    public function edit(Gallery $gallery)
    {
        return view('admin.pages.gallery.add', compact('gallery'));
    }


    /*
    * role: Delete Gallery

    * comments:
    */
    public function delete(Request $request)
    {
        (new Gallery())->deleteGallery($request);

        return 'true';
    }

}
