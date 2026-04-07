<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Services_1;

class Services_2Controller extends Controller
{
    public function index()
    {
        
        return view('admin.pages.services_1.index');
    }
    
    public function listing()
    {
       
        $services_1 = Services_1::all();
        // Dtf filters for datatable pagintion
        $count = (clone $services_1)->count();
               $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];
 
        
        foreach ($services_1 as $key => $services) {
                $records['data'][] = [
                    'id' => $key + 1,
                    'name' => ucwords($services->title),
                    'sub_title' => ucwords($services->sub_title),
                    'description' => $services->description,
                    'image' => '<img src="' . (isset($services->img) && !empty($services->img) ?  \Storage::url($services->img) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    'created_at' => \Carbon\Carbon::parse($services->created_at)->format('d-m-Y'),
                    'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $services->id, 'routeName' => 'admin.services_1', 'status' => $services->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                    
                    'action' => view('admin.shared.action')->with(['id' => $services->id, 'routeName' => 'admin.services_1', 'view' => false])->render(),
                ];
        }
        return $records;
    }


    public function create()
    {
        return view('admin.pages.services_1.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'sub_title' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'description' => 'nullable',
        ]);


        if ($request->hasFile('img')) {
            $images=$request->file('img');
           $timestamp = now()->timestamp;
                $filename = $timestamp . '_' . str_replace(' ', '-', $images->getClientOriginalName());

                $local_url = 'service_1/' . $filename;

                // Store the file with the unique filename
                \Storage::disk('public')->put($local_url, file_get_contents($images));
            $validatedData['img'] = $local_url;
        }

        Services_1::create($validatedData);

        return redirect()->route('admin.services_1.index')->with('success', 'Service created successfully');
    }

    public function edit($id)
    {
        $service_1 = Services_1::findOrFail($id);
        return view('admin.pages.services_1.edit', compact('service_1'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required',
            'sub_title' => 'nullable',
            'img' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'nullable',
        ]);

        $service_1 = Services_1::findOrFail($id);


            if ($request->hasFile('img')) {
            $images=$request->file('img');
           $timestamp = now()->timestamp;
                $filename = $timestamp . '_' . str_replace(' ', '-', $images->getClientOriginalName());

                $local_url = 'service_1/' . $filename;

                // Store the file with the unique filename
                \Storage::disk('public')->put($local_url, file_get_contents($images));
            $validatedData['img'] = $local_url;
        }

        $service_1->update($validatedData);

        return redirect()->route('admin.services_1.index')->with('success', 'Service updated successfully');
    }

    public function destroy($id)
    {
        $service_1 = Services_1::findOrFail($id);
        $service_1->delete();

      return 'true';
    }




    public function changeStatus(Request $request)
    {
        (new Services_1())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Service Status has been Changed."]);
    }
}
