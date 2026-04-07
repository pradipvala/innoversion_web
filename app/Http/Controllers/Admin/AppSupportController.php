<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AppSupport;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Http\Requests\AppSupportRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;

use Auth, Mail, File, DB,Exception;
use Yajra\DataTables\DataTables;

class AppSupportController extends Controller
{

    use ValidatesRequests;

    public function all()
    {
        $app_supt= AppSupport::orderBy('created_at', 'DESC');
        return view('admin.pages.appSupport.app_support_list',compact('app_supt'));
    }

   
    
    public function create()
    {
        return view('admin.pages.appSupport.app_support_add');
    }

    public function save(REQUEST $request)
    {
        // dd($request);

        $app_supt['title']=isset($request->title)&&!empty($request->title)?$request->title:NULL;
        $app_supt['description']=isset($request->description)&&!empty($request->description)?$request->description:NULL;
        
        
        $app_supt['technologies']=isset($request->technologies)&&!empty($request->technologies)?$request->technologies:NULL;
        $app_supt['website']=isset($request->website)&&!empty($request->website)?$request->website:NULL;
        
        $app_supt['phone_no']=isset($request->phone_no)&&!empty($request->phone_no)?$request->phone_no:NULL;
        $app_supt['email']=isset($request->email)&&!empty($request->email)?$request->email:NULL;

        $app_supt['time_to_connect']=isset($request->time_to_connect)&&!empty($request->time_to_connect)?$request->time_to_connect:NULL;
        $app_supt['connection_medium']=isset($request->connection_medium)&&!empty($request->connection_medium )?$request->connection_medium :NULL;


        $app_supt['remark']=isset($request->remark)&&!empty($request->remark)?$request->remark:NULL;
        
        $app_supt['status'] = '1';

        $app_supt['created_at'] = date('Y-m-d H:i:s');
        $app_supt['created_by'] = Auth::user()->id;

        // dd($app_supt);
        
        //DB::enableQueryLog(); DB::getQueryLog();

        $save=AppSupport::create($app_supt);

        if($save){
             
            return redirect()->route('admin.appsupport')->with('success', 'App Support details added successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to Save Details');
        }
    }


    public function old_listing(Request $request)
    {
        // extract($this->DTFilters($request->all()));

        // $app_supt = AppSupport::where('deleted_at', '=' , null)->orderBy('created_at', 'DESC');

        // $search = $request['search']['value'];
        // if (!empty($search)) {
        //     $app_supt->where('title', "like", "%" . $search . "%")
        //             ->orWhere('description', "like", "%".$search."%")
        //             ->orWhere('technologies', "like", "%".$search."%")
        //             ->orWhere('website', "like", "%".$search."%")
        //             ->orWhere('phone_no', "like", "%".$search."%")
        //             ->orWhere('email', "like", "%".$search."%")
        //             ->orWhere('time_to_connect', "like", "%".$search."%")
        //             ->orWhere('connection_medium', "like", "%".$search."%")
        //             ->orWhere('remark', "like", "%".$search."%")
        //             ->orWhere('created_at', "like", "%".$search."%");
        // }

        // $count = (clone $app_supt)->count();

        // $records["recordsTotal"] = $count;
        // $records["recordsFiltered"] = $count;
        // $records['data'] = [];

        // $app_supt->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        // $app_supt = $app_supt->get();

        // // dd($app_supt);

        // foreach ($app_supt as $key => $app) {

        //         $records['data'][] = [
        //             'id' => $key + 1,
                    
        //             'category' => 'App Support',

        //             // 'title' => isset($app->title) && !empty($app->title)?$app->title:NULL,
        //             'description' => isset($app->description) && !empty($app->description)?$app->description:NULL,
                    
                    //DO BOT REMOVE CODE WILL USE IN FUTURE

                    // 'technologies' => isset($app->technologies) && !empty($app->technologies)?$app->technologies:NULL,
                    // 'website' => isset($app->website) && !empty($app->website)?$app->website:NULL,

                    // 'phone_no' => isset($app->phone_no) && !empty($app->phone_no)?$app->phone_no:NULL,
                    // 'email' => isset($app->email) && !empty($app->email)?$app->email:NULL,

                    
                    // 'time_to_connect' => isset($app->time_to_connect) && !empty($app->time_to_connect)?$app->time_to_connect:NULL,
                    // 'connection_medium' => isset($app->connection_medium) && !empty($app->connection_medium)?$app->connection_medium:NULL,

                    // 'remark' => isset($app->remark) && !empty($app->remark)?$app->remark:NULL,

                    // 'franchise_code' => isset($app->franchise_code)&&!empty($app->franchise_code)?$app->franchise_code:NULL,

        //             'generate_invoice' => '<button type="button" class="btn btn-success" >Generate Invoice</button>',
        //             'pay_now' => '<button type="button" class="btn btn-primary" >Pay Now</button>',
                    
        //             'created_at' => \Carbon\Carbon::parse($app->created_at)->format('d-m-Y'),
        //             'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $app->id, 'routeName' => 'admin.appsupport', 'status' => $app->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
        //             'action' => view('admin.shared.action')
        //             ->with(['id' => $app->id, 'routeName' => 'admin.appsupport', 'view' => false])
        //             ->render(),
        //             //'view' => false, 'franchise_code' => true
        //         ];
            
        // }
        // return $records;
    }

    public function changeStatus(Request $request)
    {
        (new AppSupport())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "App Support Status has been Changed."]);
    }

    public function delete(Request $request)
    {
            $id = $request->id;

            if(!empty($id)){
                $delete = AppSupport::where(['id' => $id])->delete();

                if($delete)
                {
                    return response()->json(['status' => 200, 'message' => 'App Support deleted successfully']);
                }
                else
                {
                    return response()->json(['status' => 500, 'message' => 'Failed to update App Support']);
                }
            }
            else{ 
                return response()->json(['status' => 500, 'message' => 'Something went wrong']);
            }
                
        
        // (new AppSupport())->deleteAppSupport($id);

        // return redirect()->route('admin.appsupport')->with('success', 'App Support details Deleted successfully');

        // return 'true';
    }

    public function show($id)
    {   

        if(isset($id) && $id != '' && $id != null){
            $id = $id;
        }else{
            return redirect()->route('admin.appsupport')->with('error', 'Something went wrong');
        }
        
        $app_support = AppSupport::where('id', $id)->first();
        
        return view('admin.pages.appSupport.app_support_view',compact('app_support'));
    }

    public function edit(Request $request,$id)
    {
        $app_support= AppSupport::where('id', $id)->first();

        // dd($app_support);
        
        return view('admin.pages.appSupport.app_support_edit', compact('app_support'));
    }

    public function update(Request $request)
    {
       
        $id=$request->id;

       if($request->ajax()){ dd('yes Ajax');  return true ;} 

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
        $update_app_support=AppSupport::where('id', $id)->update($update);

        if($update_app_support){
             
            return redirect()->route('admin.appsupport')->with('success', 'App Support details updated successfully');
            
        }else{
            return redirect()->back()->with('error', 'Failed to Update Details');
        }
    }


    public function listing(Request $request)
    {

        if ($request->ajax()) {


             $userRolename = Auth::user()->roles->pluck('name')[0] ?? '' ;

                if($userRolename =='Master Admin'){
                    
                     $data = AppSupport::where('deleted_at', '=' , null)
                                ->orderBy('created_at', 'DESC')->get();

                }else{

                     $data = AppSupport::where('deleted_at', '=' , null)
                                        ->where('created_by', '=' , Auth::user()->id )
                                        ->orderBy('created_at', 'DESC')
                                        ->get();
                    
                }

           

            return DataTables::of($data)
                    ->addIndexColumn()

                    ->addColumn('action', function ($data) {
                    $return = '<div class="">';

                    if (auth()->user()->can('app-support-view')) {
                        $return .=  '<a href="'.route('admin.appsupport.view', ['id' => $data->id]).'" class="view_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-success"><i class="fa fa-eye"></i></button>
                                        </a> &nbsp;';
                    }

                    if (auth()->user()->can('app-support-edit')) {
                        $return .= '<a href="'.route('admin.appsupport.edit', ['id' => $data->id]).'" class="edit_btn">
                                            <button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button>
                                        </a> &nbsp;';
                    }

                   if (auth()->user()->can('app-support-delete')) {
                        $return .= '<a class="" href="javascript:void(0);" onclick="delete_func(this);" data-id="'.$data->id.'"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a> &nbsp;</li></ul>';

                   }

                    $return .= '</div>';

                    // dd($return);

                    return $return;
                })

                ->editColumn('category', function ($data) {
                    
                    return $data->category='App Support';
                    
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
                    
                    return view('admin.shared.action', ['statusshow' => true, 'id' => $data->id, 'routeName' => 'admin.appsupport', 'status' => $data->status, 'view' => false, 'edit' => false, 'delete' => false])->render();
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
