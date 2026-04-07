<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\PermissionRequest;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth, Mail, File, Exception;

use Yajra\DataTables\DataTables;

class PermissionController extends Controller
{
    use ValidatesRequests;

    /** construct */
        public function __construct(){
            $this->middleware('permission:permission-create', ['only' => ['create']]);
            $this->middleware('permission:permission-edit', ['only' => ['edit']]);
            $this->middleware('permission:permission-view', ['only' => ['view']]);
            $this->middleware('permission:permission-delete', ['only' => ['delete']]);
        }
    /** construct */

    
    /** index */
    public function index(Request $request){

        if($request->ajax()){
            $data = Permission::select('id', 'name', 'guard_name')->orderBy('id', 'desc')->get();

                return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($data){

                    $return = '<div class="btn-group">';

                    //if(auth()->user()->can('permission-view')){
                        $return .= '<a href="'.route('admin.permission.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                        <i class="fa fa-eye"></i>
                                    </a> &nbsp;';
                    //}

                    // if(auth()->user()->can('permission-edit')){
                        $return .= '<a href="'.route('admin.permission.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                        <i class="fa fa-edit"></i>
                                    </a> &nbsp;';
                    //}

                    //if(auth()->user()->can('permission-delete')){
                        $return .= '<a class="btn btn-default btn-xs" href="javascript:void(0);" onclick="delete_func(this);" data-id="'.$data->id.'">
                                        <i class="fa fa-trash"></i>
                                    </a> &nbsp;';
                    //}

                    $return .= '</div>';

                    return $return;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.pages.permission.index');
    }

    /** index */


    /** create */
        public function create(Request $request){
            return view('admin.pages.permission.create');
        }
    /** create */


    /** insert */
        public function store(Request $request){
            if($request->ajax()){ return true; }

            $curd = [
                'name' => $request->name,
                'guard_name' => $request->guard_name,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $last_id = Permission::insertGetId($curd);

            if($last_id > 0){
                return redirect()->route('admin.permission')->with('success', 'Permission Record inserted successfully');
            }else{
                return redirect()->back()->with('error', 'Failed to insert record')->withInput();
            }
        }
    /** insert */



    /** edit */ 
        public function edit(Request $request){
            if(isset($request->id) && $request->id != '' && $request->id != null)
                $id = base64_decode($request->id);
            else
                return redirect()->route('admin.permission')->with('error', 'Something went wrong');

            $data = Permission::find($id);

            return view('admin.pages.permission.edit')->with(['data' => $data]);
        }
    /** edit */



    /** update */
        public function update(Request $request){
            if($request->ajax()){ return true ;}

            $curd = [
                'name' => $request->name,
                'guard_name' => $request->guard_name,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $update = Permission::where(['id' => $request->id])->update($curd);

            if($update)
                return redirect()->route('admin.permission')->with('success', 'Permission Record updated successfully');
            else
                return redirect()->back()->with('error', 'Failed to update permission record')->withInput();
        }
    /** update */



    /** view */
        public function show(Request $request){
            if(isset($request->id) && $request->id != '' && $request->id != null)
                $id = base64_decode($request->id);
            else
                return redirect()->route('admin.permission')->with('error', 'Something went wrong');

            $data = Permission::find($id);

            return view('admin.pages.permission.view')->with(['data' => $data]);
        }
    /** view */



    /** delete */
        public function delete(Request $request){
            if(!$request->ajax()){ exit('No direct script access allowed'); }

            if(!empty($request->all())){
                $id = $request->id;
                $delete = Permission::where(['id' => $id])->delete();

                if($delete){
                    return response()->json(['status' => 200, 'msg' => 'Permission deleted successfully']);
                }
                else{
                    return response()->json(['status' => 500, 'msg' => 'Failed to update permission']);
                }
                   
            }else{
                    return response()->json(['status' => 500, 'msg' => 'Something went wrong']);
            }
        }
    /** delete */



}
