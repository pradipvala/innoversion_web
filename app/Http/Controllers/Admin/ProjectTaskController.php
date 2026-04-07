<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use App\Models\ProjectTask;
use App\Models\Milestone;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

use App\Mail\StatusChangedMail;
use Illuminate\Support\Facades\Mail;

use Auth, File, DB,Exception;
use Yajra\DataTables\DataTables;

class ProjectTaskController extends Controller
{
    use ValidatesRequests;

    public function __construct(){

        $this->middleware('permission:project-task-create', ['only' => ['create']]);
        $this->middleware('permission:project-task-edit', ['only' => ['edit']]);
        $this->middleware('permission:project-task-view', ['only' => ['view']]);
        $this->middleware('permission:project-task-delete', ['only' => ['delete']]);
    }

    public function all()
    {
        $task= ProjectTask::orderBy('created_at', 'DESC');
        return view('admin.pages.project_task.project_task_list',compact('task'));
    }

   
    
    public function create()
    {
        $data['user'] = User::whereHas('roles', function($query) {
                            $query->where('name', 'developer')
                                  ->where('status','active');
        })->get();
        
        return view('admin.pages.project_task.project_task_add',$data);
    }

    public function save(REQUEST $request)
    {
        // dd($request);

        $task['title']=isset($request->title)&&!empty($request->title)?$request->title:NULL;
        $task['description']=isset($request->description)&&!empty($request->description)?$request->description:NULL;
        
        
        $task['category']=isset($request->category)&&!empty($request->category)?$request->category:NULL;
        $task['assign_to_user']=isset($request->assign_to_user)&&!empty($request->assign_to_user)?$request->assign_to_user:NULL;
       
        $task['status'] = 1;

        $task['created_at'] = date('Y-m-d H:i:s');
        $task['created_by'] = Auth::user()->id;

        // dd($task);
        
        //DB::enableQueryLog(); DB::getQueryLog();

        $save=ProjectTask::create($task);

        if($save){
             
            return redirect()->route('admin.project.task')->with('success', 'Project task details added successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to Save Details');
        }
    }

   public function show($id)
    {   

        if(isset($id) && $id != '' && $id != null){
            $data = ProjectTask::where('id', $id)->first();

            $milestone_data = Milestone::where('project_task_id', $id)
                                         ->where('status',1)
                                         ->get();

            $assign_to_user = User::where('id', $data->assign_to_user)
                                         ->where('status',1)
                                         ->select('id','name')
                                         ->first();

        }else{
            return redirect()->route('admin.project.task')->with('error', 'Something went wrong');
        }
        
        // dd($milestone_data);
        
        
        return view('admin.pages.project_task.project_task_view',compact('data','milestone_data','assign_to_user'));
    }

    public function changeStatus(Request $request)
    {
        (new ProjectTask())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Project task status has been changed."]);
    }

    public function delete(Request $request)
    {   
        $id = $request->id;

        if(!empty($id)){
                $delete = ProjectTask::where(['id' => $id])->delete();

                if($delete){
                    return response()->json(['status' => 200, 'message' => 'Project task deleted successfully']);
                }
                else{
                    return response()->json(['status' => 500, 'message' => 'Failed to update project task']);
                }
            }
            else{ 
                return response()->json(['status' => 500, 'message' => 'Something went wrong']);
            }
    }

    public function edit(Request $request,$id)
    {
            if(isset($id) && $id != '' && $id != null){
                    
                    $data= ProjectTask::where('id', $id)->first();

                    $milestone_data = Milestone::where('project_task_id', $id)->get();

                    $assign_to = User::where('id', $data->assign_to_user)
                                         ->where('status',1)
                                         ->select('id as user_id')
                                         ->first();

                    $assign_user = User::whereHas('roles', function($query) {
                                        $query->where('name', 'developer')
                                              ->where('status','active');
                                    })->get();

                    //dd($assign_to->user_id);

            }else{
                return redirect()->route('admin.project.task')->with('error', 'Something went wrong');
            }
   
        return view('admin.pages.project_task.project_task_edit', compact('data','milestone_data','assign_to','assign_user'));
    }

    public function update(Request $request)
    {

         // dd($request);
       
        $id=$request->id;

        $update= [
            
            'title' => isset($request->title) && !empty($request->title)?$request->title:NULL,
            'description' => isset($request->description) && !empty($request->description)?$request->description:NULL,
            
            'category' => isset($request->category)&&!empty($request->category)?$request->category:NULL,
            'assign_to_user' => isset($request->assign_to_user)&&!empty($request->assign_to_user)?$request->assign_to_user:NULL,
            
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' =>Auth::user()->id,
            
        ];


        // DB::enableQueryLog(); dd(DB::getQueryLog());
        $update_project_task=ProjectTask::where('id', $id)->update($update);

        if($update_project_task){
             
            return redirect()->route('admin.project.task')->with('success', 'Project task details updated successfully');
            
        }else{
            return redirect()->back()->with('failed', 'Failed to Update Details');
        }
    }  

    public function listing(Request $request)
    {

        if ($request->ajax()) {

            


            $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){
                    
                    $data = ProjectTask::where('deleted_at', '=' , null)
                                ->orderBy('created_at', 'DESC')->get();

                }else{

                    $data = ProjectTask::where('deleted_at', '=' , null)
                                        ->where('assign_to_user', '=' , Auth::user()->id )
                                        ->orderBy('created_at', 'DESC')
                                        ->get();

                }

            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($data) {
                    $return = '<div class="">';

                    if (auth()->user()->can('project-task-view')) {
                        $return .=  '<a href="'.route('admin.project.task.view', ['id' => $data->id]).'" class="view_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-success"><i class="fa fa-eye"></i></button>
                                        </a> &nbsp;';
                    }

                    if (auth()->user()->can('project-task-edit')) {
                        $return .= '<a href="'.route('admin.project.task.edit', ['id' => $data->id]).'" class="edit_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button>
                                        </a> &nbsp;';
                    }

                   if (auth()->user()->can('project-task-delete')) {
                        $return .= '<a class="" onclick="delete_project_task('.$data->id.');" ><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;</li></ul>';
                   }



                   $return .='<button type="button" class="btn btn-primary" data-target="#exampleModalCenter'.$data->id.'" data-toggle="modal">Create Task</button>';

                     $return .='<div class="modal fade" id="exampleModalCenter'.$data->id.'" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="false">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                        <form role="form" method="POST" action="'. route('admin.create_project_task',$data->id).'" >
                        <input type="hidden" name="_token" value="'.csrf_token().'">
                        <input type="hidden" name="milestone_id" id="milestone_id" value="'.$data->id.'">
                            <div class="modal-content">
                                <div class="modal-body" >
                                    <label><b>Create Task</b> :- </label><br>
                                    <textarea name="milestone_description" id="milestone_description" style="width: 600px; height: 150px;" class="form-control" row="2" column="10" required></textarea>
                                </div>
                                <div class="modal-footer" style="border:none;">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit"  class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>';



                    $return .= '</div>';

                    // dd($return);

                    return $return;
                })

                ->editColumn('category', function ($data) {
                    
                    return $data->category;
                    
                })

                ->editColumn('task_assign_name', function ($data) {

                    $userRole = Auth::user()->roles->pluck('name')[0] ?? '' ;

                    if($userRole =='Master Admin'){

                        $assign_to = User::where('id', $data->assign_to_user)
                                             ->where('status',1)
                                             ->first();
                        
                    }else{

                        $assign_to = User::where('id', $data->created_by)
                                             ->where('status',1)
                                             ->first();
                    }
                    
                    $assign_user_name=$assign_to->name ?? '-';
                   // dd($assign_to->name);


                    return $assign_user_name;
                })

                

                ->editColumn('title', function ($data) {
                    
                    return $data->title;
                    
                })

                ->editColumn('description', function ($data) {
                    
                    return $data->description;
                    
                })

                ->editColumn('created_at', function ($data) {
                    
                    return date('Y-m-d H:i:s', strtotime(date($data->created_at))); 

                    
                })

                ->editColumn('status', function ($data) {
                    
                    return view('admin.shared.action', ['statusshow' => true, 'id' => $data->id, 'routeName' => 'admin.project.task', 'status' => $data->status, 'view' => false, 'edit' => false, 'delete' => false])->render();
                })

                ->rawColumns(['title','description', 'category','task_assign_name','created_at', 'status', 'action'])
                ->make(true);
        }

        $search = $request['search']['value'];
        
        if (!empty($search)) {
                $data->where('title', "like", "%" . $search . "%")
                    ->orWhere('description', "like", "%".$search."%")
                    ->orWhere('category', "like", "%".$search."%")
                    ->orWhere('created_at', "like", "%".$search."%");
        }
        
        
        return $data;
        
    }



    public function change_project_task_status(Request $request){

        $user = Auth::user();

        if (!empty($request->all())) {
            $id = $request->id;
            $task_status = $status = $request->task_status;

            $data =  ProjectTask::where(['id' => $id])->first();

            // dd($data);

            if(!empty($data)){
                
                $process = ProjectTask::where(['id' => $id])->update(['task_status' => $task_status]);

                if($process){

                    // Send email to the logged-in user
                    Mail::to($user->email)->send(new StatusChangedMail($status));

                    return response()->json(['code' => 200]);
                }else{
                    return response()->json(['code' => 201]);
                }
            } else {
                return response()->json(['code' => 201]);
            }
        } else {
            return response()->json(['code' => 201]);
        }
    }
    


    public function create_project_milestone(Request $request,$id)
    {

        
        $project_task_id=isset($request->milestone_id) && !empty($request->milestone_id)?$request->milestone_id:NULL;

        if($project_task_id==NULL){
            return 'Something Went Wrong';return false;
        }


       

        $insert['milestone_description']=isset($request->milestone_description)&&!empty($request->milestone_description)?$request->milestone_description:NULL;

        $insert['project_task_id'] = $project_task_id;
        $insert['status'] = 1;

        $insert['created_at'] = date('Y-m-d H:i:s');
        $insert['created_by'] = Auth::user()->id;

        //DB::enableQueryLog();   dd(DB::getQueryLog());

        $save=Milestone::create($insert);

        

        if($save){
             
            return redirect()->route('admin.project.task')->with('success', 'Task details added successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to save milestone details');
        }

    }


    public function update_milestone(Request $request,$id)
    {

        // dd($request);
       $milestone_id=isset($id) && !empty($id)?$id:NULL;


        $milestone_description = [

            'milestone_description' => isset($request->milestone_description) && !empty($request->milestone_description) ? $request->milestone_description:NULL,
            'task_status' => isset($request->task_status) && !empty($request->task_status) ? $request->task_status:NULL,

            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' =>Auth::user()->id,
        ];

        $update_milestone_description =  Milestone::where('id', $milestone_id)->update($milestone_description);


        if($update_milestone_description){
             
            return redirect()->route('admin.project.task')->with('success', 'Task details updated successfully and email sent');
            
        }else{
            return redirect()->back()->with('failed', 'Failed to update details');
        }
        
    }

}
