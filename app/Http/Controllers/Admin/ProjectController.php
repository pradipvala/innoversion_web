<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Image;
use Auth, DB, Validator, File, DataTables, Exception, URL;

class ProjectController extends Controller
{
    /*
        * Project: Display resources

        * comments:
    */
    public function all()
    {
        return view('admin.pages.project.list');
    }

    /*
        * Homepage : Listing Project

        * comments:
    */
    public function listing(Request $request)
    {

        extract($this->DTFilters($request->all()));
        
        //DB::enableQueryLog();  dd(DB::getQueryLog());
        $projects = Projects::orderBy('id' , 'desc')->get();


        // dd(count($projects));

        $search = $request['search']['value'];
        if (!empty($search)) {
                                        $projects->where('title', "like", "%" . $search . "%")
                                                 ->orWhere('description', "like", "%" . $search . "%")
                                                 ->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $projects)->count();



        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        

        $projects = Projects::offset($offset)->limit($limit)->orderBy($sort_column, $sort_order)->get();

        foreach ($projects as $key => $val) {
            $records['data'][] = [
                'id' => $key + 1,
                'title' => ucwords($val->title),
                'description' => $val->description,
                'project_image' => '<img src="' . (!empty($val->project_image) ? $val->project_image : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                'created_at' => \Carbon\Carbon::parse($val->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $val->id, 'routeName' => 'admin.project', 'status' => $val->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')
                    ->with(['id' => $val->id, 'routeName' => 'admin.project', 'view' => false])
                    ->render(),
            ];
        }
        return $records;
    }


    /*
    * role: create Project

    * comments:
    */
    public function create()
    {

        return view('admin.pages.project.add');
    }


    /*
    * role: Save Project

    * comments:
    */
    public function save(Request $request)
    {

         // image validation
        $validator =  \Validator::make($request->all(),[
            'title' => 'required',
            'project_image'    => 'required|mimes:jpg,jpeg,png,gif',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }



        if($request->hasFile('project_image')){

            $image = $request->project_image;
             $file_name = $image->getClientOriginalName();
             $folder = public_path().'/project_image';
             $path = URL::to('/').'/public/project_image/'. $file_name;
             if (!File::exists($folder)) {
                 File::makeDirectory($folder, 0775, true, true);
            }
             
            $file = $image->move($folder, $file_name);
        }
      
      
        $crud = [

            'title' => isset($request->title)&&!empty($request->title)?$request->title:NULL,
            'description' => isset($request->description)&&!empty($request->description)?$request->description:NULL,
            'created_at' => date('Y-m-d H:i:s'),
            'status' => '1',
            'project_image' => isset($path)&&!empty($path)?$path:NULL
        ];

        // dd($crud);

        $last_id = Projects::insertGetId($crud);

        if ($last_id) {
            return redirect()->route('admin.projects')->with(['success' => 'Project data inserted successfully']);
        } else {
            return redirect()->back()->with(['error'=>'Faild to insert Record!'])->withInput();
        }
        
        // $project = (new Projects())->saveproject($request);

        // (new Image())->saveProjectimage($request,'App\Models\Projects',$project);

        //return redirect()->route('admin.projects');
    }


    /*
    * role: Change Project status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Projects())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit Project

    * comments:
    */
    public function edit(Projects $project)
    {
        return view('admin.pages.project.edit', compact('project'));
    }

     public function update(Request $request)
     {
         
        // dd($request);
         
        if($request->hasFile('project_image')){

            $image = $request->project_image;
             $file_name = $image->getClientOriginalName();
             $folder = public_path().'/project_image';
             $path = URL::to('/').'/public/project_image/'. $file_name;
             if (!File::exists($folder)) {
                 File::makeDirectory($folder, 0775, true, true);
            }
             
            $file = $image->move($folder, $file_name);
        }
        else{
            $path = isset($request->project_image_path)&&!empty($request->project_image_path)?$request->project_image_path:NULL;
        }

        // dd($path);

        $crud = Projects::where(['id' => $request->project_id])->update([
                            
                            'title' => isset($request->title)&&!empty($request->title)?$request->title:NULL,
                            'description' => isset($request->description)&&!empty($request->description)?$request->description:NULL,
                            'created_at' => date('Y-m-d H:i:s'),
                            'project_image' => $path,
                            'updated_at' => date('Y-m-d H:i:s'),
                            
         ]);
 
         if ($crud) {
             return redirect()->route('admin.projects')->with(['success' => 'Project data updated successfully']);
         } else {
             return redirect()->back()->with(['error'=>'Faild to update Record!'])->withInput();
         }
    }



    /*
    * role: Delete Project

    * comments:
    */
    public function delete(Request $request)
    {
        (new Projects())->deleteProject($request);

        return 'true';
    }
}
