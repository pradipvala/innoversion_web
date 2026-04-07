<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\Country;
use Auth, DB, Mail, File, Exception;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Yajra\DataTables\DataTables;



class CountryController extends Controller{
    /** construct */

    use ValidatesRequests;

        public function __construct(){
            $this->middleware('permission:country-create', ['only' => ['create']]);
            $this->middleware('permission:country-edit', ['only' => ['edit']]);
            $this->middleware('permission:country-view', ['only' => ['view']]);
            $this->middleware('permission:country-delete', ['only' => ['delete']]);
        }
    /** construct */

    /** index */
        public function index(Request $request){
            

            if($request->ajax()){

                $data = Country::select('*')->orderBy('id' , 'desc')->get();

               
                    return DataTables::of($data)
                        ->addIndexColumn()
                        ->addColumn('action', function($data){
                            $return = '<div class="btn-group">';

                             
                                $return .= '<a href="'.route('admin.country.view', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
                                                <i class="fa fa-eye"></i>
                                            </a> &nbsp;';
                            
                                $return .= '<a href="'.route('admin.country.edit', ['id' => base64_encode($data->id)]).'" class="btn btn-default btn-xs">
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
            return view('admin.pages.country.index');
        }
  

    
        public function create(Request $request){

            $data = Country::select('country.*')->where(['status' => 'active'])->get();
            return view('admin.pages.country.create')->with(['data' => $data]);
        }
    

        public function insert(Request $request){

            

            if($request->ajax()){
                return true ;
            }


            $crud = [
                'id'=> $request->id,
                'country_name'=> $request->country_name,
                'iso3'=> $request->code,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => auth()->user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id

            ];

            

            DB::beginTransaction();
            try {
                DB::enableQueryLog();
                $last_id = Country::insertGetId($crud);

                if ($last_id) {

                    DB::commit();
                    return redirect()->route('admin.country')->with('success', 'Record inserted successfully');
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
            $data = Country::select('country.*')->where(['id' => $id])->first();
            return view('admin.pages.country.view')->with(['data' => $data]);
        }
    
        public function edit(Request $request){
            $id = base64_decode($request->id);
            $data = Country::select('country.*')->where(['id' => $id])->first();
            return view('admin.pages.country.edit')->with(['data' => $data]);
        }
    
        public function update(Request $request){
            if($request->ajax()){
                return true ;
            }
           
           $crud = [
                'id'=> $request->id,
                'country_name'=> $request->country_name,
                'iso3'=> $request->code,
                'status' => 'active',
                'created_at' => date('Y-m-d H:i:s'),
                'created_by' => auth()->user()->id,
                'updated_at' => date('Y-m-d H:i:s'),
                'updated_by' => auth()->user()->id
            ];


            DB::beginTransaction();
            try {
                DB::enableQueryLog();
                $update = Country::where(['id' => $request->id])->update($crud);
                if($update){
                    DB::commit();
                    return redirect()->route('admin.country')->with('success', 'Record updated successfully');
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
                $data = Country::where(['id' => $id])->first();

                if(!empty($data)){
                    $update = Country::where(['id' => $id])->update(['status' => $request->status, 'updated_at' => date('Y-m-d H:i:s')]);
                    if($update){
                        return response()->json(['code' => 200]);
                    }else{
                        return response()->json(['code' => 201]);
                    }
                }else{
                    return response()->json(['code' => 201]);
                }
        }
    /** change-status */

}
