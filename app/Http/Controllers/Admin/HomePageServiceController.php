<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageService;
class HomePageServiceController extends Controller
{

    public function index()
    {
        return view('admin.pages.home_page_service.index');
    }

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion
        extract($this->DTFilters($request->all()));

        // get data from about_us table
        $aboutusdata = HomePageService::orderBy('id', 'ASC');

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
                'title' => ucwords($aboutus->title),
                'description' => ucwords($aboutus->description),

                'image' => '<img src="' . (!empty($aboutus->image) ? \Storage::url($aboutus->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                'created_at' => \Carbon\Carbon::parse($aboutus->created_at)->format('d-m-Y'),
                'action' => view('admin.shared.action')
                    ->with(['id' => $aboutus->id, 'routeName' => 'admin.homepageservice', 'view' => false])
                    ->render(),
            ];
        }
        return $records;
    }





    public function create()
    {
        return view('admin.pages.home_page_service.create');

    }
    public function save(Request $request)
    {
        $homepageservice = new HomePageService();
        $homepageservice->title = $request->input('title');
        $homepageservice->description = $request->input('description');

        if ($request->hasFile('image')) {

           $imagepath = 'homepageservice/' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            \Storage::disk('public')->put($imagepath, file_get_contents($request->file('image')));

            //Delete old image when update franchise image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            
            $ext = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                $image_path=$imagepath;
            } 

            $homepageservice->image = $imagepath;
        }

        
        // if($request->hasFile('image'))
        // {
        //      $imagepath=$request->file('image')->store('homepageservice','public');
        //      $homepageservice->image = $imagepath;
        // }

        $homepageservice->save();

        return redirect()->back();
    }


    public function edit(HomePageService $id)
    {
        return view('admin.pages.home_page_service.edit')->with(['homepageservice'=>$id]);
    }

    public function update(HomePageService $id,Request $request)
    {
        $homepageservice=$id;
        $homepageservice->title =$request->input('title');
        $homepageservice->description = $request->input('description');

         if($request->hasFile('image')) {

           $imagepath = 'homepageservice/' . str_replace(' ', '-', $request->file('image')->getClientOriginalName());
            \Storage::disk('public')->put($imagepath, file_get_contents($request->file('image')));



            //Delete old image when update franchise image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            // dd($homepageservice);

            $ext = pathinfo($request->file('image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext === 'JPG' || $ext === 'PNG' || $ext == 'JPEG') {
                
                $image_path=$imagepath;
            } 

            $homepageservice->image = $imagepath;
            
            
        }
        

        // if($request->hasFile('image'))
        // {
        //      $imagepath=$request->file('image')->store('homepageservice','public');
        //      $homepageservice->image = $imagepath;
        // }


        $homepageservice->save();


         return redirect()->route('admin.homepageservice');

    }

    public function delete(HomePageService $id)
    {
        $id->delete();
        return redirect()->back();
    }

    public function destroy($id)
    {


        $homepageservice = HomePageService::where('id','=',$id)->first();

        $homepageservice->delete();
        return 'true';
    }

}
