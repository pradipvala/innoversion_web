<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;

class TestimonialController extends Controller
{
   /*
        * tesmonial: Display resources

        * comments:
    */
    public function index(Request $request)
    {

        return view('admin.pages.testimonial.view');
    }



    /*
        * Testimonial: Display testimonial

        * comments:
    */
    public function all()
    {

        return view('admin.pages.testimonial.view');
    }


    /*
    * role: lesting Testimonial

    * comments:
    */
    public function listing(Request $request)
    {
     
        extract($this->DTFilters($request->all()));

        $testimonials = Testimonial::orderBy('id','ASC');

        $search = $request['search']['value'];
            if(!empty($search)) {
                $testimonials->where('name', "like", "%".$search."%")->orWhere('description', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
            }

            //dd($testimonials->toSql();
        $count = (clone $testimonials)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();

        $testimonials->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);
        $testimonials = $testimonials->get();


        foreach ($testimonials as $key => $testimonial) {

            $records['data'][] = [
                'id' => $key + 1,
                'name' => ucwords($testimonial->name),
                'description' => ucwords($testimonial->description),
                'created_at'    =>  \Carbon\Carbon::parse($testimonial->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $testimonial->id, 'routeName' => 'admin.testimonial', 'status' => $testimonial->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $testimonial->id, 'routeName' => 'admin.testimonials', 'view' => false])->render(),
            ];
        }


        return $records;
    }


    /*
    * role: create Testimonial

    * comments:
    */
    public function create()
    {

        return view('admin.pages.testimonial.add');
    }


    /*
    * role: Save testimonial

    * comments:
    */
     public function store(Request $request)
    {

        (new Testimonial())->savetestimonial($request);

        return redirect()->route('admin.testimonials');
    }


    /*
    * role: edit Testimonial

    * comments:
    */
    public function edit(Testimonial $testimonial)
    {

        return view('admin.pages.testimonial.add', compact('testimonial'));
    }


    /*
    * role: change Testimonial status

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Testimonial())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role:delete Testimonial

    * comments:
    */
    public function delete(Request $request)
    {

        (new Testimonial())->deletetestimonial($request);

        return 'true';
    } 
}
