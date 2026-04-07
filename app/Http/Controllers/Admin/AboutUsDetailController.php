<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\About_us_details;

class AboutUsDetailController extends Controller
{
    public function all()
    {
        return view('admin.pages.AboutUsDetail.list');
    }
    
    public function listing(Request $request)
    {

        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        // get data from About_us_details
        $about_us_detail = About_us_details::orderBy('id', 'ASC');

        $search = $request['search']['value'];
        if (!empty($search)) {
            $about_us_detail->where('title', "like", "%" . $search . "%")
                            ->orWhere('short_description', "like", "%" . $search . "%")
                            ->orWhere('description', "like", "%" . $search . "%")
                            
                            ->orWhere('about_us_ceo_info', "like", "%" . $search . "%")
                            
                            ->orWhere('ceo_name', "like", "%" . $search . "%")
                            ->orWhere('ceo_desg', "like", "%" . $search . "%")
                            
                            ->orWhere('mission_title', "like", "%" . $search . "%")
                            ->orWhere('mission_description', "like", "%" . $search . "%")
                              
                            ->orWhere('vision_title', "like", "%" . $search . "%")
                            ->orWhere('vision_description', "like", "%" . $search . "%")
                            
                            ->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $about_us_detail)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $about_us_detail->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $about_us_detail = $about_us_detail->get();

        foreach ($about_us_detail as $key => $about_us) {
            
            $about_us_ceo_image = '<img src="' . (!empty($about_us->about_us_ceo_image) ? \Storage::url($about_us->about_us_ceo_image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';
            $mission_image = '<img src="' . (!empty($about_us->mission_image) ? \Storage::url($about_us->mission_image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';
            $vision_image = '<img src="' . (!empty($about_us->vision_image) ? \Storage::url($about_us->vision_image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';
            
            $records['data'][] = [
                'id' => $key + 1,
                'title' => ucwords($about_us->title),
                'short_description' => $about_us->short_description,
                'description' => $about_us->description,
                
                'about_us_ceo_image' => $about_us_ceo_image,
                'about_us_ceo_info' => $about_us->about_us_ceo_info,
                
                'ceo_name' => $about_us->ceo_name,
                'ceo_desg' => $about_us->ceo_desg,
                
                'ceo_name' => $about_us->ceo_name,
                'ceo_desg' => $about_us->ceo_desg,
                
                'mission_title' => $about_us->mission_title,
                'mission_description' => $about_us->mission_description,
                'mission_image' => $mission_image,
                
                'vision_title' => $about_us->vision_title,
                'vision_description' => $about_us->vision_description,
                'vision_image' => $vision_image,
                
                
                'created_at' => \Carbon\Carbon::parse($about_us->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $about_us->id, 'routeName' => 'admin.about_us_detail', 'status' => $about_us->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')
                    ->with(['id' => $about_us->id, 'routeName' => 'admin.about_us_detail', 'view' => false])
                    ->render(),
            ];
        }
        return $records;
    }

    
    
    public function create()
    {
        return view('admin.pages.AboutUsDetail.add');
    }

    
    
    public function save(Request $request)
    {   

        // image video validation
        $validator = \Validator::make($request->all(), [
            'about_us_ceo_image' => 'mimes:jpg,jpeg,png,gif | max:20000',
            'mission_image' => 'mimes:jpg,jpeg,png,gif | max:20000',
            'vision_image' => 'mimes:jpg,jpeg,png,gif | max:20000',
        ]);
        if ($validator->fails()) {
            return back()->withErrors($validator->errors())->withInput();
        }

        (new About_us_details())->saveAbout_us_detail($request);

        return redirect()->route('admin.about_us_detail');
    }

    
    
    public function changeStatus(Request $request)
    {
        (new About_us_details())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "About Us Details Status has been Changed."]);
    }

    
    
    public function edit(Request $request,$id)
    {
        $about_us_detail = About_us_details::where('id', $id)->first();
        
        
        // dd($about_us_detail);
        
        return view('admin.pages.AboutUsDetail.edit', compact('about_us_detail'));
    }
    
    public function update(Request $request)
    {
        // dd($request->title);
        
        $about_us_detail_id = isset($request->about_us_detail_id)&&!empty($request->about_us_detail_id)?$request->about_us_detail_id:NULL;
        
        // dd($about_us_detail_id);
        
        $about_us_detail['title'] = isset($request->title) && !empty($request->title) ? $request->title:NULL;
         
        $about_us_detail['short_description'] = isset($request->short_description)&&!empty($request->short_description)?$request->short_description:NULL;
        $about_us_detail['description'] = isset($request->description)&&!empty($request->description)?$request->description:NULL;
        
        $about_us_detail['about_us_ceo_info'] = isset($request->about_us_ceo_info)&&!empty($request->about_us_ceo_info)?$request->about_us_ceo_info:NULL;
        
        $about_us_detail['ceo_name'] = isset($request->ceo_name)&&!empty($request->ceo_name)?$request->ceo_name:NULL;
        $about_us_detail['ceo_desg'] = isset($request->ceo_desg)&&!empty($request->ceo_desg)?$request->ceo_desg:NULL;
        
        $about_us_detail['mission_title'] = isset($request->mission_title)&&!empty($request->mission_title)?$request->mission_title:NULL;
        $about_us_detail['mission_description'] = isset($request->mission_description)&&!empty($request->mission_description)?$request->mission_description:NULL;
        
        $about_us_detail['vision_title'] = isset($request->vision_title)&&!empty($request->vision_title)?$request->vision_title:NULL;
        $about_us_detail['vision_description'] = isset($request->vision_description)&&!empty($request->vision_description)?$request->vision_description:NULL;
        
        
        
         
        
        
        if ($request->hasFile('about_us_ceo_image')) {

            // save image in public storage
            $local_url = 'about_us_images/' . str_replace(' ', '-', $request->file('about_us_ceo_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('about_us_ceo_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $ext = pathinfo($request->file('about_us_ceo_image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext == 'gif') {
                $image_type=$ext;
            } 

            $about_us_detail['about_us_ceo_image'] = $local_url;
        }
        
        
        if ($request->hasFile('mission_image')) {

            // save image in public storage
            $local_url = 'about_us_images/' . str_replace(' ', '-', $request->file('mission_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('mission_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $ext = pathinfo($request->file('mission_image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext == 'gif') {
                $image_type=$ext;
            } 

            $about_us_detail['mission_image'] = $local_url;
        }
        
        
        if ($request->hasFile('vision_image')) {

            // save image in public storage
            $local_url = 'about_us_images/' . str_replace(' ', '-', $request->file('vision_image')->getClientOriginalName());
            \Storage::disk('public')->put($local_url, file_get_contents($request->file('vision_image')));

            //Delete old image when update Slider image
            if ($request->old_image !== null) {
                \Storage::delete($request->old_image);
            }

            $ext = pathinfo($request->file('vision_image')->getClientOriginalName(), PATHINFO_EXTENSION);

            if ($ext === 'jpg' || $ext === 'png' || $ext == 'jpeg' || $ext == 'gif') {
                 $image_type=$ext;
            } 

            $about_us_detail['vision_image'] = $local_url;
        }
        
        
        // dd($about_us_detail);
        
        $update_about_data = About_us_details::where('id','=',$about_us_detail_id)->update($about_us_detail);
        
        if($update_about_data){
            return redirect()->route('admin.about_us_detail')->with('success', 'About Us details updated successfully');
        }else{
            return redirect()->route('admin.about_us_detail')->with('failed', 'Failed to update details');
        }
        
        // DB::table('franchise')->where('id', $id)->update($update);
        
        
        // return redirect()->route('admin.about_us_detail');
        
       
    }

    
    public function delete(Request $request)
    {
        (new About_us_details())->deleteAboutUsDetail($request);

        return 'true';
    }
}