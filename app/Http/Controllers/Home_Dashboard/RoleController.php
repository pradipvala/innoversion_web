<?php

namespace App\Http\Controllers\Home_Dashboard;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\RoleRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Auth, Mail, File, DataTables, Exception;



class RoleController extends Controller 
{
    use ValidatesRequests;
    
    /** construct */
    public function __construct(){
        $this->middleware('permission:role-create', ['only' => ['create']]);
        $this->middleware('permission:role-edit', ['only' => ['edit']]);
        $this->middleware('permission:role-view', ['only' => ['view']]);
        $this->middleware('permission:role-delete', ['only' => ['delete']]);
    }

    
/** construct */

    public function index(Request $request)
    {

        // dd(auth()->user());
        //if(auth()->user()->can('role-view')){
        if($request->ajax()) {

            $data = Role::orderBy('id', 'DESC')->get();

            
                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){
                        $return = '<div class="btn-group">';

                        //if(auth()->user()->can('role-view')){
                            $return .= '<a href="'.route('roles.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                            <i class="fa fa-eye"></i>
                                        </a> &nbsp;';
                       //}

                        // if(auth()->user()->can('role-edit')){
                            $return .= '<a href="'.route('roles.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                            <i class="fa fa-edit"></i>
                                        </a> &nbsp;';
                        //}

                        //if(auth()->user()->can('role-delete')){
                            $return .= '<a class="btn btn-default btn-xs" href="javascript:void(0);" onclick="delete_func(this);" data-id="'.$data->id.'">
                                            <i class="fa fa-trash"></i>
                                        </a> &nbsp;';
                        //}

                        $return .= '</div>';
                        
                        return $return;
                    })

                    ->editColumn('name', function($data) {
                        return ucfirst(str_replace('_', ' ', $data->name));
                    })

                    ->editColumn('guard_name', function($data) {
                        return ucfirst($data->guard_name);
                    })

                    ->rawColumns(['name', 'guard_name', 'action'])
                    ->make(true);

        }
        return view('roles.index');
    //}
    
    }

    public function create()
    {
        $permission = Permission::get();
        return view('roles.create', compact('permission'));
    }
    

    public function store(Request $request)
    {
        if($request->ajax()){ return true; }

            $this->validate($request, [
                'name' => 'required|unique:roles,name',
                'permission' => 'required',
            ]);

            // dd($request);

            $curd = [
                'name' => $request->name,
                'guard_name' => 'web',
                'created_at' => date('Y-m-d H:i:s'),
            ];

            $role = Role::create($curd);
            $last_inserted_id=$role->id;

            if($role){

                foreach ($request->permission as $key=>$perm_id) {
                    DB::table("role_has_permissions")->insert(['role_id' => $last_inserted_id,'permission_id' => $perm_id]);
                }

                // $role->syncPermissions($request->permission);

                return redirect()->route('role')->with('success', 'Role created successfully');
            }else{
                return redirect()->back()->with('error', 'Failed to insert record')->withInput();
            }
    }




    public function show(Request $request, $id)
    {
        if(isset($request->id) && $request->id != '' && $request->id != null){
            $id = base64_decode($request->id);
        }else{
                return redirect()->route('role')->with('error', 'Something went wrong');
        }
                
        $role = Role::find($id);
        $permissions = Permission::get();

        // dd($id);

        //DB::enableQueryLog(); dd(DB::getQueryLog());
        // $role_permissions = DB::table("role_has_permissions")
        //                             ->where("role_has_permissions.role_id", $id)
        //                             ->pluck('role_has_permissions.permission_id','role_has_permissions.permission_id')
        //                             ->all();

       
        
        // $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
        //                     ->where("role_has_permissions.role_id", $id)
        //                     ->get();

        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
                            ->where("role_has_permissions.role_id", $id)
                            ->get();

        // dd($rolePermissions);

        return view('roles.show', compact('role', 'permissions', 'rolePermissions'));
    }

    public function edit($id)
    {
        
        if(isset($id) && $id != '' && $id != null){
            $id = base64_decode($id);
        }else{
            return redirect()->route('role')->with('error', 'Something went wrong');
        }
        
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id')
            ->all();
        // dd($rolePermissions);

        

        return view('roles.edit', compact('role', 'permission', 'rolePermissions'));
    }

    public function update(Request $request, $id)
    {
        // dd($id);
        // dd($request);
        if($request->ajax()){ return true ;}

        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);

        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->updated_at = date('Y-m-d H:i:s');

        
        $delete_rolePermissions = DB::table('role_has_permissions')->where('role_id', $id)->delete();
        
        
        if($role->save()){

            foreach ($request->permission as $key=>$perm_id) {
                DB::table("role_has_permissions")->insert(['role_id' => $id,'permission_id' => $perm_id]);
            }

            // $role->syncPermissions($request->permissions);

            return redirect()->route('role')->with('success', 'Role updated successfully');
        }else{
            return redirect()->back()->with('error', 'Failed to update record')->withInput();
        }
    }

    /** delete */
    public function delete(Request $request){
        
        if(!$request->ajax()){ exit('No direct script access allowed'); }

        if(!empty($request->all())){
            $id = $request->id;
            $delete = Role::where(['id' => $id])->delete();

            if($delete){
                return response()->json(['status' => 200, 'msg' => 'Role deleted successfully']);
               // return redirect()->route('role')->with('success', 'Role deleted successfully');
            }
            else{
                return response()->json(['status' => 500, 'msg' => 'Failed to update role']);
                // return redirect()->back()->with('error', 'Failed to update role')->withInput();
            }
                
        }else{

            return response()->json(['status' => 500, 'msg' => 'Something went wrong']);
            // return redirect()->route('role')->with('error', 'Something went wrong');
        }
    }
    /** delete */
}