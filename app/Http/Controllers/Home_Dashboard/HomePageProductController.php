<?php

namespace App\Http\Controllers\Home_Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageProduct;
use App\Models\ProductPoint;


class HomePageProductController extends Controller
{

    public function index()
    {
        return view('frontend.homepageproduct.index');
    }

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion
        extract($this->DTFilters($request->all()));

        // get data from about_us table
        $aboutusdata = HomePageProduct::orderBy('id', 'ASC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $aboutusdata->where('name', "like", "%" . $search . "%")->orWhere('description', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $aboutusdata)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $aboutusdata->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $aboutusdata = $aboutusdata->get();

        foreach ($aboutusdata as $key => $aboutus) {
            $points = $aboutus->productpoints->pluck('title')->implode(', ');

            $records['data'][] = [
                'id' => $key + 1,
                'name' => ucwords($aboutus->name),
                'description' => ucwords($aboutus->description),
                'points' => $points,
                'image' => '<img src="' . (!empty($aboutus->image) ? \Storage::url($aboutus->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                'created_at' => \Carbon\Carbon::parse($aboutus->created_at)->format('d-m-Y'),
                'action' => view('frontend.shared.action')
                    ->with(['id' => $aboutus->id, 'routeName' => 'homepageproduct', 'view' => false])
                    ->render(),
            ];
        }
        return $records;
    }



    public function create()
    {
        return view('frontend.homepageproduct.create');
    }

    public function save(Request $request)
    {
       $homepageproduct=new HomePageProduct();
       $homepageproduct->name =$request->input('title');
       $homepageproduct->description = $request->input('description');
       if($request->hasFile('image'))
       {
            $imagepath=$request->file('image')->store('homepageproduct','public');
            $homepageproduct->image = $imagepath;
       }
       $homepageproduct->save();

       foreach($request->input('point') as $point)
       {
        if($point!="")
        {
            $productpoint = new ProductPoint();
            $productpoint->p_id = $homepageproduct->id;
            $productpoint->title = $point;
            $productpoint->save();
        }
    }

        return redirect()->route('create.homepageproduct');

    }

    public function edit(HomePageProduct $id)
    {
        return view('frontend.homepageproduct.edit')->with(['homepageproduct'=>$id]);
    }

    public function update(HomePageProduct $id,Request $request)
    {
        $homepageproduct=$id;
        $homepageproduct->name =$request->input('title');
        $homepageproduct->description = $request->input('description');
        if($request->hasFile('image'))
        {
             $imagepath=$request->file('image')->store('homepageproduct','public');
             $homepageproduct->image = $imagepath;
        }
        $homepageproduct->save();
        $homepageproduct->productpoints()->delete();
        foreach($request->input('point') as $point)
        {
         if($point!="")
         {
             $productpoint = new ProductPoint();
             $productpoint->p_id = $homepageproduct->id;
             $productpoint->title = $point;
             $productpoint->save();
         }
     }

         return redirect()->route('create.homepageproduct');

    }

    public function destroy($id)
    {


        $homepageproduct = HomePageProduct::where('id','=',$id)->first();
        $homepageproduct->productpoints()->delete();
        $homepageproduct->delete();
        return 'true';
    }

}

