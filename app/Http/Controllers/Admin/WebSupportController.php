<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WebSupport;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\WebSupportRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Auth, Mail, File, DB,Exception;
use Yajra\DataTables\DataTables;

class WebSupportController extends Controller
{
    use ValidatesRequests;

    public function __construct(){

        $this->middleware('permission:web-support-create', ['only' => ['create']]);
        $this->middleware('permission:web-support-edit', ['only' => ['edit']]);
        $this->middleware('permission:web-support-view', ['only' => ['view']]);
        $this->middleware('permission:web-support-delete', ['only' => ['delete']]);
    }

    public function all()
    {
        $web_supt= WebSupport::orderBy('created_at', 'DESC');
        return view('admin.pages.webSupport.web_support_list',compact('web_supt'));
    }

   
    
    public function create()
    {
        return view('admin.pages.webSupport.web_support_add');
    }

    public function save(REQUEST $request)
    {
        // dd($request);

        $web_supt['title']=isset($request->title)&&!empty($request->title)?$request->title:NULL;
        $web_supt['description']=isset($request->description)&&!empty($request->description)?$request->description:NULL;
        
        
        $web_supt['technologies']=isset($request->technologies)&&!empty($request->technologies)?$request->technologies:NULL;
        $web_supt['website']=isset($request->website)&&!empty($request->website)?$request->website:NULL;
        
        $web_supt['phone_no']=isset($request->phone_no)&&!empty($request->phone_no)?$request->phone_no:NULL;
        $web_supt['email']=isset($request->email)&&!empty($request->email)?$request->email:NULL;

        $web_supt['time_to_connect']=isset($request->time_to_connect)&&!empty($request->time_to_connect)?$request->time_to_connect:NULL;
        $web_supt['connection_medium']=isset($request->connection_medium)&&!empty($request->connection_medium )?$request->connection_medium :NULL;


        $web_supt['remark']=isset($request->remark)&&!empty($request->remark)?$request->remark:NULL;
        
        $web_supt['status'] = '1';

        $web_supt['created_at'] = date('Y-m-d H:i:s');
        $web_supt['created_by'] = Auth::user()->id;

        // dd($web_supt);
        
        //DB::enableQueryLog(); DB::getQueryLog();

        $save=WebSupport::create($web_supt);

        if($save){
             
            return redirect()->route('admin.websupport')->with('success', 'Web Support details added successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to Save Details');
        }
    }


    // public function listing_old(Request $request)
    // {
    //     extract($this->DTFilters($request->all()));

    //     $web_supt = WebSupport::where('deleted_at', '=' , null)->orderBy('created_at', 'DESC');

    //     $search = $request['search']['value'];
    //     if (!empty($search)) {
    //         $web_supt->where('title', "like", "%" . $search . "%")
    //                 ->orWhere('description', "like", "%".$search."%")
    //                 ->orWhere('technologies', "like", "%".$search."%")
    //                 ->orWhere('website', "like", "%".$search."%")
    //                 ->orWhere('phone_no', "like", "%".$search."%")
    //                 ->orWhere('email', "like", "%".$search."%")
    //                 ->orWhere('time_to_connect', "like", "%".$search."%")
    //                 ->orWhere('connection_medium', "like", "%".$search."%")
    //                 ->orWhere('remark', "like", "%".$search."%")
    //                 ->orWhere('created_at', "like", "%".$search."%");
    //     }

    //     $count = (clone $web_supt)->count();

    //     $records["recordsTotal"] = $count;
    //     $records["recordsFiltered"] = $count;
    //     $records['data'] = [];

    //     $web_supt->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

    //     $web_supt = $web_supt->get();

    //     // dd($web_supt);

    //     foreach ($web_supt as $key => $web) {

    //             $records['data'][] = [
    //                 'id' => $key + 1,
                    
    //                 'category' => 'Web Support',

    //                 // 'title' => isset($web->title) && !empty($web->title)?$web->title:NULL,
    //                 'description' => isset($web->description) && !empty($web->description)?$web->description:NULL,
                    
    //                 //DO BOT REMOVE CODE WILL USE IN FUTURE

    //                 // 'technologies' => isset($web->technologies) && !empty($web->technologies)?$web->technologies:NULL,
    //                 // 'website' => isset($web->website) && !empty($web->website)?$web->website:NULL,

    //                 // 'phone_no' => isset($web->phone_no) && !empty($web->phone_no)?$web->phone_no:NULL,
    //                 // 'email' => isset($web->email) && !empty($web->email)?$web->email:NULL,

                    
    //                 // 'time_to_connect' => isset($web->time_to_connect) && !empty($web->time_to_connect)?$web->time_to_connect:NULL,
    //                 // 'connection_medium' => isset($web->connection_medium) && !empty($web->connection_medium)?$web->connection_medium:NULL,

    //                 // 'remark' => isset($web->remark) && !empty($web->remark)?$web->remark:NULL,

    //                 // 'franchise_code' => isset($web->franchise_code)&&!empty($web->franchise_code)?$web->franchise_code:NULL,

    //                 'generate_invoice' => '<button type="button" class="btn btn-success" >Generate Invoice</button>',
    //                 'pay_now' => '<button type="button" class="btn btn-primary" >Pay Now</button>',
                    
    //                 'created_at' => \Carbon\Carbon::parse($web->created_at)->format('d-m-Y'),

    //                 'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $web->id, 'routeName' => 'admin.websupport', 'status' => $web->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
    //                 'action' => view('admin.shared.action')
    //                 ->with(['id' => $web->id, 'routeName' => 'admin.websupport', 'view' => false])
    //                 ->render(),


    //                 //'view' => false, 'franchise_code' => true
    //             ];
            
    //     }
    //     return $records;
    // }

    public function show($id)
    {   

        if(isset($id) && $id != '' && $id != null){
            $id = $id;
        }else{
            return redirect()->route('admin.websupport')->with('error', 'Something went wrong');
        }
        
        $web_support = WebSupport::where('id', $id)->first();
        
        return view('admin.pages.webSupport.web_support_view',compact('web_support'));
    }

    public function changeStatus(Request $request)
    {
        (new WebSupport())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Web Support Status has been Changed."]);
    }

    public function delete(Request $request)
    {   

        $id = $request->id;

            if(!empty($id)){
                $delete = WebSupport::where(['id' => $id])->delete();

                if($delete){
                    return response()->json(['status' => 200, 'message' => 'Web Support deleted successfully']);
                }
                else{
                    return response()->json(['status' => 500, 'message' => 'Failed to update Web Support']);
                }
            }
            else{ 
                return response()->json(['status' => 500, 'message' => 'Something went wrong']);
            }
        
        // (new WebSupport())->deleteWebSupport($id);

        // return redirect()->route('admin.websupport')->with('success', 'Web Support details Deleted successfully');

        
    }

    public function edit(Request $request,$id)
    {
        $web_support= WebSupport::where('id', $id)->first();

        // dd($web_support);
        
        return view('admin.pages.webSupport.web_support_edit', compact('web_support'));
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
        $update_web_support=WebSupport::where('id', $id)->update($update);

        if($update_web_support){
             
            return redirect()->route('admin.websupport')->with('success', 'Web Support details updated successfully');
            
        }else{
            return redirect()->back()->with('failed', 'Failed to Update Details');
        }
    }
        

    public function listing(Request $request)
    {

        if ($request->ajax()) {

            


            $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){
                    
                    $data = WebSupport::where('deleted_at', '=' , null)
                                ->orderBy('created_at', 'DESC')->get();

                }else{

                    $data = WebSupport::where('deleted_at', '=' , null)
                                        ->where('created_by', '=' , Auth::user()->id )
                                        ->orderBy('created_at', 'DESC')
                                        ->get();

                }

            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($data) {
                    $return = '<div class="">';

                    if (auth()->user()->can('web-support-view')) {
                        $return .=  '<a href="'.route('admin.websupport.view', ['id' => $data->id]).'" class="view_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-success"><i class="fa fa-eye"></i></button>
                                        </a> &nbsp;';
                    }

                    if (auth()->user()->can('web-support-edit')) {
                        $return .= '<a href="'.route('admin.websupport.edit', ['id' => $data->id]).'" class="edit_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button>
                                        </a> &nbsp;';
                    }

                   if (auth()->user()->can('web-support-delete')) {
                        $return .= '<a class="" href="javascript:void(0);" onclick="delete_func(this);" data-id="'.$data->id.'"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;</li></ul>';
                   }

                    $return .= '</div>';

                    // dd($return);

                    return $return;
                })

                ->editColumn('category', function ($data) {
                    
                    return $data->category='Web Support';
                    
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
                    
                    return view('admin.shared.action', ['statusshow' => true, 'id' => $data->id, 'routeName' => 'admin.websupport', 'status' => $data->status, 'view' => false, 'edit' => false, 'delete' => false])->render();
                })

                ->rawColumns(['category','title', 'pay_now', 'created_at', 'status', 'action'])
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

}
