<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth, Mail, File, DB,Exception;
use Yajra\DataTables\DataTables;
use App\Models\GlobalFranchiseFees;

class GlobalFranchiseFeesController extends Controller
{
    use ValidatesRequests;

    public function __construct(){

        $this->middleware('permission:global-configuration-create', ['only' => ['create']]);
        $this->middleware('permission:global-configuration-edit', ['only' => ['edit']]);
        $this->middleware('permission:global-configuration-view', ['only' => ['view']]);
        $this->middleware('permission:global-configuration-delete', ['only' => ['delete']]);
    }

    public function all()
    {
        $global_franchise_fees= GlobalFranchiseFees::orderBy('created_at', 'DESC');
        return view('admin.pages.global_franchise_fees.global_franchise_fees_list',compact('global_franchise_fees'));
    }

    public function listing(Request $request)
    {

        if ($request->ajax()) {

            $data = GlobalFranchiseFees::where('deleted_at', '=' , null)
                                ->orderBy('created_at', 'DESC')->get();

            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($data) {
                    $return = '<div class="">';

                    if (auth()->user()->can('global-configuration-view')) {
                        $return .=  '<a href="'.route('admin.global_franchise.view', ['id' => $data->id]).'" class="view_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-success"><i class="fa fa-eye"></i></button>
                                        </a> &nbsp;';
                    }

                    if (auth()->user()->can('global-configuration-edit')) {
                        $return .= '<a href="'.route('admin.global_franchise.edit', ['id' => $data->id]).'" class="edit_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button>
                                        </a> &nbsp;';
                    }

                    if (auth()->user()->can('global-configuration-delete')) {
                        $return .= '<a class="" href="javascript:void(0);" onclick="delete_func(this);" data-id="'.$data->id.'"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;</li></ul>';
                    }

                    $return .= '</div>';

                    return $return;
                })

                ->editColumn('global_franchise_fees', function ($data) {
                    
                    return $data->global_franchise_fees;
                    
                })

                ->editColumn('created_at', function ($data) {
                    
                    return date('Y-m-d H:i:s', strtotime(date($data->created_at))); 

                    
                })

                ->editColumn('status', function ($data) {
                    
                    return view('admin.shared.action', ['statusshow' => true, 'id' => $data->id, 'routeName' => 'admin.global_franchise', 'status' => $data->status, 'view' => false, 'edit' => false, 'delete' => false])->render();
                })

                ->rawColumns(['global_franchise_fees', 'created_at', 'status', 'action'])
                ->make(true);
        }

        $search = $request['search']['value'];
        
        if (!empty($search)) {
            $data->where('title', "like", "%" . $search . "%")
                    ->orWhere('global_franchise_fees', "like", "%".$search."%")
                    ->orWhere('created_at', "like", "%".$search."%");
        }
        
        
        return $data;
        
    }

   
    
    public function create()
    {
        return view('admin.pages.global_franchise_fees.global_franchise_fees_add');
    }

    public function save(REQUEST $request)
    {
        // dd($request);

        $global_franchise_fees['global_franchise_fees']=isset($request->global_franchise_fees)&&!empty($request->global_franchise_fees)?$request->global_franchise_fees:NULL;
        
        $global_franchise_fees['status'] = '1';

        $global_franchise_fees['created_at'] = date('Y-m-d H:i:s');
        $global_franchise_fees['created_by'] = Auth::user()->id;

        // dd($global_franchise_fees);
        
        //DB::enableQueryLog(); DB::getQueryLog();

        $save=GlobalFranchiseFees::create($global_franchise_fees);

        if($save){
             
            return redirect()->route('admin.global_franchise')->with('success', 'Global franchise fees added successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to Save Details');
        }
    }

    public function edit(Request $request,$id)
    {
        $global_franchise_fees= GlobalFranchiseFees::where('id', $id)->first();

        // dd($global_franchise_fees);
        
        return view('admin.pages.global_franchise_fees.global_franchise_fees_edit', compact('global_franchise_fees'));
    }

    public function update(Request $request)
    {
       
        $id=$request->id;

        $update= [
            
            'global_franchise_fees' => isset($request->global_franchise_fees) && !empty($request->global_franchise_fees)?$request->global_franchise_fees:NULL,
            
            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' =>Auth::user()->id,
            
        ];

        // dd($update);

        // DB::enableQueryLog(); dd(DB::getQueryLog());
        $update_global_franchise_fees=GlobalFranchiseFees::where('id', $id)->update($update);

        if($update_global_franchise_fees){
             
            return redirect()->route('admin.global_franchise')->with('success', 'Global franchise fees updated successfully');
            
        }else{
            return redirect()->back()->with('failed', 'Failed to Update Details');
        }
    }

    public function delete(Request $request)
    {   

        $id = $request->id;

        if(!empty($id)){
            $delete = GlobalFranchiseFees::where(['id' => $id])->delete();

            if($delete){
                return response()->json(['status' => 200, 'message' => 'Global franchise fees deleted successfully']);
            }
            else{
                return response()->json(['status' => 500, 'message' => 'Failed to update Global franchise fees']);
            }
        }
        else{ 
            return response()->json(['status' => 500, 'message' => 'Something went wrong']);
        }
    }

    public function show($id)
    {   

        if(isset($id) && $id != '' && $id != null){
            $fees_id = isset($id)&&!empty($id)?$id:NULL;
        }else{
            return redirect()->route('admin.global_franchise')->with('error', 'Something went wrong');
        }
        
        $global_franchise_fees = GlobalFranchiseFees::where('id', $fees_id)->first();
        
        return view('admin.pages.global_franchise_fees.global_franchise_fees_view',compact('global_franchise_fees'));
    }

    public function changeStatus(Request $request)
    {
        (new GlobalFranchiseFees())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "global franchise fees status has been changed."]);
    }
}
