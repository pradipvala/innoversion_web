<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    /*
        * Slider: Display resources

        * comments:
    */
    public function all()
    {
        return view('admin.pages.slider.list');
    }

    /*
        * Homepage : Listing Slider

        * comments:
    */
    public function listing(Request $request)
    {

        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        // get data from slider
        $sliders = Slider::orderBy('id', 'ASC');

        $search = $request['search']['value'];
        if (!empty($search)) {
            $sliders->where('title', "like", "%" . $search . "%")->orWhere('description', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $sliders)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $sliders->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $sliders = $sliders->get();

        foreach ($sliders as $key => $slider) {
            if ($slider->type == 'video') {
                $url = '<video loop autoplay src="' . (!empty($slider->image) ? \Storage::url($slider->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120"  autoplay/>';
            } else {
                $url = '<img src="' . (!empty($slider->image) ? \Storage::url($slider->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';
            }

            $records['data'][] = [
                'id' => $key + 1,
                'title' => ucwords($slider->title),
                'description' => $slider->description,
                'slider_image' => $url,
                'created_at' => \Carbon\Carbon::parse($slider->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $slider->id, 'routeName' => 'admin.slider', 'status' => $slider->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')
                    ->with(['id' => $slider->id, 'routeName' => 'admin.sliders', 'view' => false])
                    ->render(),
            ];
        }
        return $records;
    }

    /*
    * role: create Slider

    * comments:
    */
    public function create()
    {
        return view('admin.pages.slider.add');
    }

    /*
    * role: Save Slider

    * comments:
    */
    public function save(Request $request)
    {   

        // image video validation
        $validator = \Validator::make($request->all(), [
            'slider_image' => 'mimes:jpg,jpeg,png,mp4,mov,ogg | max:20000',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        (new Slider())->saveSlider($request);

        return redirect()->route('admin.sliders');
    }

    /*
    * role: Change slider status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Slider())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }

    /*
    * role: Edit Slider

    * comments:
    */
    public function edit(Slider $slider)
    {

        return view('admin.pages.slider.add', compact('slider'));
    }

    /*
    * role: Delete Slider

    * comments:
    */
    public function delete(Request $request)
    {
        (new Slider())->deleteSlider($request);

        return 'true';
    }
}
