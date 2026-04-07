<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ServerSupport;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth, Mail, File, DB,Exception;
use Yajra\DataTables\DataTables;

class ServerSupportController extends Controller
{

    use ValidatesRequests;

    public function __construct(){

        $this->middleware('permission:server-support-create', ['only' => ['create']]);
        $this->middleware('permission:server-support-edit', ['only' => ['edit']]);
        $this->middleware('permission:server-support-view', ['only' => ['view']]);
        $this->middleware('permission:server-support-delete', ['only' => ['delete']]);
    }

    public function all()
    {
        $web_supt= ServerSupport::orderBy('created_at', 'DESC');
        return view('admin.pages.serverSupport.server_support_list',compact('web_supt'));
    }

    public function listing(Request $request)
    {

        if ($request->ajax()) {


            $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){
                    
                    $data = ServerSupport::where('deleted_at', '=' , null)
                                ->orderBy('created_at', 'DESC')->get();

                }else{
                    
                    $data = ServerSupport::where('deleted_at', '=' , null)
                                ->where('created_by', '=' , Auth::user()->id )
                                ->orderBy('created_at', 'DESC')
                                ->get();
                }


            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($data) {
                    $return = '<div class="">';

                    if (auth()->user()->can('server-support-view')) {
                        $return .=  '<a href="'.route('admin.serversupport.view', ['id' => $data->id]).'" class="view_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-success"><i class="fa fa-eye"></i></button>
                                        </a> &nbsp;';
                    }

                    if (auth()->user()->can('server-support-edit')) {
                        $return .= '<a href="'.route('admin.serversupport.edit', ['id' => $data->id]).'" class="edit_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button>
                                        </a> &nbsp;';
                    }

                   if (auth()->user()->can('server-support-delete')) {
                        $return .= '<a class="" href="javascript:void(0);" onclick="delete_func(this);" data-id="'.$data->id.'"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;</li></ul>';
                   }

                    $return .= '</div>';

                    // dd($return);

                    return $return;
                })

                ->editColumn('category', function ($data) {
                    
                    return $data->category='Server Support';
                    
                })

                ->editColumn('title', function ($data) {
                    
                    return $data->title;
                    
                })

                
                // ->editColumn('generate_invoice', function ($data) {
                    
                //     $generate_invoice='<button type="button" class="btn btn-info" >Generate Invoice</button>';
                //     return $generate_invoice;
                    
                // })

                ->editColumn('pay_now', function ($data) {

                    $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                    if($userRolename == "Master Admin" ){

                         $pay_now='<button type="button" class="btn btn-info" >Generate Invoice</button>';

                    }else{

                        $pay_now='<button type="button" class="btn btn-primary" >Pay Now</button>';
                    }
                    
                    
                    
                    return $pay_now;
                    
                })

                ->editColumn('created_at', function ($data) {
                    
                    return date('Y-m-d H:i:s', strtotime(date($data->created_at))); 

                    
                })

                ->editColumn('status', function ($data) {
                    
                    return view('admin.shared.action', ['statusshow' => true, 'id' => $data->id, 'routeName' => 'admin.serversupport', 'status' => $data->status, 'view' => false, 'edit' => false, 'delete' => false])->render();
                })

                ->rawColumns(['category','title','pay_now', 'created_at', 'status', 'action'])
                ->make(true);
        }

        $search = $request['search']['value'];
        
        if (!empty($search)) {
            $data->where('title', "like", "%" . $search . "%")
                    ->orWhere('description', "like", "%".$search."%")
                    ->orWhere('technologies', "like", "%".$search."%")
                    ->orWhere('website', "like", "%".$search."%")
                    ->orWhere('phone_no', "like", "%".$search."%")
                    ->orWhere('email', "like", "%".$search."%")
                    ->orWhere('time_to_connect', "like", "%".$search."%")
                    ->orWhere('connection_medium', "like", "%".$search."%")
                    ->orWhere('remark', "like", "%".$search."%")
                    ->orWhere('created_at', "like", "%".$search."%");
        }
        
        
        return $data;
        
    }

   
    
    public function create()
    {
        return view('admin.pages.serverSupport.server_support_add');
    }

    public function save(REQUEST $request)
    {
        // dd($request);

        $server_supt['title']=isset($request->title)&&!empty($request->title)?$request->title:NULL;
        $server_supt['description']=isset($request->description)&&!empty($request->description)?$request->description:NULL;
        
        
        $server_supt['technologies']=isset($request->technologies)&&!empty($request->technologies)?$request->technologies:NULL;
        $server_supt['website']=isset($request->website)&&!empty($request->website)?$request->website:NULL;
        
        $server_supt['phone_no']=isset($request->phone_no)&&!empty($request->phone_no)?$request->phone_no:NULL;
        $server_supt['email']=isset($request->email)&&!empty($request->email)?$request->email:NULL;

        $server_supt['time_to_connect']=isset($request->time_to_connect)&&!empty($request->time_to_connect)?$request->time_to_connect:NULL;
        $server_supt['connection_medium']=isset($request->connection_medium)&&!empty($request->connection_medium )?$request->connection_medium :NULL;


        $server_supt['remark']=isset($request->remark)&&!empty($request->remark)?$request->remark:NULL;
        
        $server_supt['status'] = '1';

        $server_supt['created_at'] = date('Y-m-d H:i:s');
        $server_supt['created_by'] = Auth::user()->id;

        // dd($server_supt);
        
        //DB::enableQueryLog(); DB::getQueryLog();

        $save=ServerSupport::create($server_supt);

        if($save){
             
            return redirect()->route('admin.serversupport')->with('success', 'Server Support details added successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to Save Details');
        }
    }

    public function show($id)
    {   

        if(isset($id) && $id != '' && $id != null){
            $id = $id;
        }else{
            return redirect()->route('admin.serversupport')->with('error', 'Something went wrong');
        }
        
        $server_support = ServerSupport::where('id', $id)->first();
        
        return view('admin.pages.serverSupport.server_support_view',compact('server_support'));
    }

    public function changeStatus(Request $request)
    {
        (new ServerSupport())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Server Support Status has been Changed."]);
    }

    public function delete(Request $request)
    {   

        $id = $request->id;

            if(!empty($id)){
                $delete = ServerSupport::where(['id' => $id])->delete();

                if($delete){
                    return response()->json(['status' => 200, 'message' => 'Server Support deleted successfully']);
                }
                else{
                    return response()->json(['status' => 500, 'message' => 'Failed to update Web Support']);
                }
            }
            else{ 
                return response()->json(['status' => 500, 'message' => 'Something went wrong']);
            }
    }

    public function edit(Request $request,$id)
    {
        $server_support= ServerSupport::where('id', $id)->first();

        // dd($server_support);
        
        return view('admin.pages.serverSupport.server_support_edit', compact('server_support'));
    }

    public function update(Request $request)
    {
       
        $id=$request->id;

        // dd($request);

       $update= [
            
            'title' => isset($request->title) && !empty($request->title)?$request->title:NULL,
            'description' => isset($request->description) && !empty($request->description)?$request->description:NULL,
            
            'technologies' => isset($request->technologies) && !empty($request->technologies)?$request->technologies:NULL,
            'website' => isset($request->website) && !empty($request->website)?$request->website:NULL,

            'phone_no' => isset($request->phone_no) && !empty($request->phone_no)?$request->phone_no:NULL,
            'email' => isset($request->email) && !empty($request->email)?$request->email:NULL,

            
            'time_to_connect' => isset($request->time_to_connect) && !empty($request->time_to_connect)?$request->time_to_connect:NULL,
            'connection_medium' => isset($request->connection_medium) && !empty($request->connection_medium)?$request->connection_medium:NULL,

            'remark' => isset($request->remark) && !empty($request->remark)?$request->remark:NULL,

            'updated_at' => date('Y-m-d H:i:s'),
            'updated_by' =>Auth::user()->id,
            
        ];

        // dd($update);

        // DB::enableQueryLog(); dd(DB::getQueryLog());
        $update_server_support=ServerSupport::where('id', $id)->update($update);

        if($update_server_support){
             
            return redirect()->route('admin.serversupport')->with('success', 'Server Support details updated successfully');
            
        }else{
            return redirect()->back()->with('failed', 'Failed to Update Details');
        }
    }
        

    
}
