<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use App\Models\City;
use App\Models\AllCity;
use App\Models\AllState;
use App\Models\Countries;

use Auth, DB, Mail, File, Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Yajra\DataTables\DataTables;



class CityController extends Controller{
    
    use ValidatesRequests;

        public function __construct(){
            $this->middleware('permission:city-create', ['only' => ['create']]);
            $this->middleware('permission:city-edit', ['only' => ['edit']]);
            $this->middleware('permission:city-view', ['only' => ['view']]);
            $this->middleware('permission:city-delete', ['only' => ['delete']]);
        }
    
        public function index(Request $request){
            if($request->ajax()){
                $data = AllCity::with('state.country')->orderBy('id' , 'desc')->get();
                    return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            $return = '<div class="btn-group">';

                           
                                $return .= '<a href="'.route('admin.city.view',['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;';
                            
                                $return .= '<a href="'.route('admin.city.edit',['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-pencil"></i>
                                            </a> &nbsp;';
                            
                                $return .= '<a href="javascript:;" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
                                                    <i class="fa fa-bars"></i>
                                                </a> &nbsp;
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="active" data-id="' . base64_encode($data->id) . '">Active</a></li>
                                                    <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="inactive" data-id="' . base64_encode($data->id) . '">Inactive</a></li>
                                                    <li><a class="dropdown-item" href="javascript:;" onclick="change_status(this);" data-status="deleted" data-id="' . base64_encode($data->id) . '">Delete</a></li>
                                                </ul>';
                            

                            $return .= '</div>';

                            return $return;
                        })


                        ->editColumn('status', function ($data) {
                            if ($data->status == 'active') {
                                return '<span class="badge badge-pill badge-success">Active</span>';
                            } else if ($data->status == 'inactive') {
                                return '<span class="badge badge-pill badge-warning">Inactive</span>';
                            } else if ($data->status == 'deleted') {
                                return '<span class="badge badge-pill badge-danger">Deleted</span>';
                            }else{
                                return '-';
                            }
                        })

                        ->rawColumns([ 'action' ,'status'])
                        ->make(true);
                }
            return view('admin.pages.city.index');
        }
    

        public function create(Request $request){

            $data = AllCity::select('all_city.*')->where(['status' => 'active'])->get();
            $state = AllState::get();
            return view('admin.pages.city.create')->with(['data' => $data,'state'=>$state]);
        }
    
        public function insert(Request $request){
            if($request->ajax()){
                return true ;
            }
            $crud = [

                'c_name' => $request->c_name,
                'state_id' => $request->state,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => auth()->user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
            ];



            DB::beginTransaction();
            try {
                
                $last_id = AllCity::insertGetId($crud);

                if ($last_id) {

                    DB::commit();
                    return redirect()->route('admin.city')->with('success', 'Record inserted successfully');
                } else {
                    DB::rollback();
                    return redirect()->back()->with('error', 'Failed to insert record')->withInput();
                }
            } catch (\Throwable $th) {
                DB::rollback();
                return redirect()->back()->with('error', 'Something went wrong, please try again later')->withInput();
            }
        }
    
        public function view(Request $request){
            $id = base64_decode($request->id);

            $data = AllCity::select('*')->where(['id' => $id])->first();
            $state = AllState::get();
            return view('admin.pages.city.view')->with(['data' => $data,'state'=>$state]);

        }
    
        public function edit(Request $request){
            $id = base64_decode($request->id);

            $data = AllCity::select('*')->where(['id' => $id])->first();
            $state = AllState::get();
            return view('admin.pages.city.edit')->with(['data' => $data,'state'=>$state]);
        }
    
        public function update(Request $request){
            if($request->ajax()){
                return true ;
            }
           
            $crud = [

                'c_name' => $request->c_name,
                'state_id' => $request->state,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => auth()->user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id

            ];


            DB::beginTransaction();
            try {
                
                $update = AllCity::where(['id' => $request->id])->update($crud);
                if($update){
                    DB::commit();
                    return redirect()->route('admin.city')->with('success', 'Record updated successfully');
                } else {
                    DB::rollback();
                    return redirect()->back()->with('error', 'Failed to update record')->withInput();
                }
            } catch (\Throwable $th) {
                DB::rollback();
                return redirect()->back()->with('error', 'Something went wrong, please try again later')->withInput();
            }
        }
    
        public function change_status(Request $request){
            if (!$request->ajax()) { exit('No direct script access allowed'); }

                $id = base64_decode($request->id);
                $data = AllCity::where(['id' => $id])->first();

                if(!empty($data)){
                    $update = AllCity::where(['id' => $id])->update(['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s'), 'updated_by' => auth('sanctum')->user()->id]);
                    if($update){
                        return response()->json(['code' => 200]);
                    }else{
                        return response()->json(['code' => 201]);
                    }
                }else{
                    return response()->json(['code' => 201]);
                }
        }
    
}
