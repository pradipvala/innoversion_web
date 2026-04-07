<?php

namespace App\Http\Controllers\Home_Dashboard;
    
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


use Illuminate\Support\Arr;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Pagination\Paginator; 

use Auth, Mail, File,  Exception;
use Yajra\DataTables\DataTables;



class UserController extends Controller
{
    use ValidatesRequests;

    
    /** construct */
    public function __construct(){
        $this->middleware('permission:user-create', ['only' => ['create']]);
        $this->middleware('permission:user-edit', ['only' => ['edit']]);
        $this->middleware('permission:user-view', ['only' => ['view']]);
        $this->middleware('permission:user-delete', ['only' => ['delete']]);
    }
/** construct */

    public function index(Request $request){


       

        if ($request->ajax()) {

            $data = User::orderBy('id', 'desc')->get();

            

            // ->whereHas('roles', function ($query) {
            //     $query->where('id', '!=', '');
            // })
            // ->get();

            // dd($data);

            return DataTables::of($data)
                ->addIndexColumn()
                
                ->addColumn('action', function ($data) {
                    $return = '<div class="btn-group">';

                    //if (auth()->user()->can('user-view')) {
                        $return .=  '<a href="'.route('users.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                            <i class="fa fa-eye"></i>
                                        </a> &nbsp;';
                    //}

                    //if (auth()->user()->can('user-edit')) {
                        $return .= '<a href="'.route('users.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a> &nbsp;';
                    //}

                   // if (auth()->user()->can('user-delete')) {
                        $return .= '<a href="javascript:;" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                            <i class="fa fa-bars"></i>
                                        </a> &nbsp;
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="active" data-id="' . base64_encode($data->id) . '">Active</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="inactive" data-id="' . base64_encode($data->id) . '">Inactive</a></li>
                                            <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="deleted" data-id="' . base64_encode($data->id) . '">Delete</a></li>
                                        </ul>';
                   // }

                    $return .= '</div>';

                    // dd($return);

                    return $return;
                })

                ->editColumn('status', function ($data) {
                        
                    if ($data->status == 'active') {
                        return '<span class="badge badge-pill badge-success">Active</span>';
                    } else if ($data->status == 'inactive') {
                        return '<span class="badge badge-pill badge-warning">Inactive</span>';
                    } else if ($data->status == 'deleted') {
                        return '<span class="badge badge-pill badge-danger">Deleted</span>';
                    } else {
                        return '-';
                    }
                })
                   
                ->editColumn('name', function ($data) {
                    
                    return $data->name;
                    
                })

                ->editColumn('department', function ($data) {
                    
                    return $data->department;
                    
                })

                ->editColumn('role', function ($data) {
                    if(!empty($data->roles->first()->name)){
                        return ucfirst(str_replace('_', ' ', $data->roles->first()->name));
                    }else{
                        return null;
                    }
                    
                })

                ->rawColumns(['name','department','email', 'role', 'status', 'action'])
                ->make(true);
        }
        
        return view('users.index');
    }
    /** index */




    /** show */
    public function show($id)
    {   

        if(isset($id) && $id != '' && $id != null){
            $id = base64_decode($id);
        }else{
            return redirect()->route('user')->with('error', 'Something went wrong');
        }
        $role = Role::all();       
        $user = User::find($id);
        
        return view('users.show',compact('user','role'));
    }
    /** show */




     /** edit */
    public function edit($id)
    {  
        
        if(isset($id) && $id != '' && $id != null){
            $id = base64_decode($id);
        }else{
            return redirect()->route('user')->with('error', 'Something went wrong');
        }
        
        $user = User::find($id);
        
        $roles = Role::pluck('name','name')->all();  //  $roles = Role::all();
        $roles_all = Role::all();
        $userRole = $user->roles->pluck('name','name')->all();
        $userRolename = $user->roles->pluck('name')->all();

        // dd($userRolename);

        return view('users.edit',compact('user','roles','userRole','userRolename'));
    }
    /** edit */



     /** update */
    public function update(Request $request)
    {   
        // dd($request);
        if(isset($request->id) && $request->id != '' && $request->id != null){
            $id = base64_decode($request->id);
        }else{
            return redirect()->route('user')->with('error', 'Something went wrong');
        }

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,'.$id,
            'department' => 'required',
            'password' => 'same:confirm-password',
            'roles' => 'required'
        ]);
    
        $input = $request->all();

        
        if(!empty($input['password'])){ 
            $data['password'] = Hash::make($input['password']);
        }else{
            $data = Arr::except($input,array('password'));    
        }
        
        $data['name'] =$request->name;
        $data['email'] = $request->email;
        $data['department'] = $request->department;


        $data['updated_at'] = date('Y-m-d H:i:s');
        // $data['updated_by'] = auth()->user()->id;

        $update = User::where(['id' => $id])->update($data);

        if($update){

            $user = User::where(['id' => $id])->first();

            DB::table('model_has_roles')->where('model_id',$id)->delete();
        
            $user->assignRole($request->input('roles'));

            return redirect()->route('user')->with('success','User updated successfully');

        }else{
            return redirect()->back()->with('error', 'Failed to update user record')->withInput();
        }

       
    }

    /** update */


    public function create()
    {
        $roles = Role::pluck('name','name')->all();
        return view('users.create',compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'department' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'role' => 'required'
        ]);
    
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        
        $input['created_by'] = auth()->user()->id;

        $user = User::create($input);
        $user->assignRole($request->role);
    
        return redirect()->route('user')->with('success','User created successfully');
    }
    
    
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('user')
                        ->with('success','User deleted successfully');
    }


    /** change-status */
    public function change_status(Request $request){
        
        if (!empty($request->all())) {
            $id = base64_decode($request->id);
            $status = $request->status;

            $data = User::where(['id' => $id])->first();

            // dd($data);

            if(!empty($data)){
                // $process = User::where(['id' => $id])->update(['status' => $status, 'updated_by' => auth()->user()->id]);

                $process = User::where(['id' => $id])->update(['status' => $status]);
                if($process){

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
    /** change-status */

}