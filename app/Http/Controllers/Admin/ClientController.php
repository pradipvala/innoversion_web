<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientController extends Controller
{
     /*
        * Client: Display resources

        * comments:
    */

    public function all()
    {
        return view('admin.pages.client.list');

    }

    /*
        * Homepage : Listing Client

        * comments:
    */

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        $clients = Client::orderBy('id','ASC');

        $search = $request['search']['value'];
            if(!empty($search)) {
                $Clients->where('name', "like", "%".$search."%");
            }

        $count = (clone $clients)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();
        

        $clients->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $clients = $clients->get();


        foreach ($clients as $key => $client) {

            $records['data'][] = [
                'id' => $key + 1,
                'image' => '<img src="' . (!empty($client->image) ?  \Storage::url($client->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="80" />',
                'created_at'    =>  \Carbon\Carbon::parse($client->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $client->id, 'routeName' => 'admin.client', 'status' => $client->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $client->id, 'routeName' => 'admin.client', 'view' => false])->render(),
            ];
    }


        return $records;
    }


    /*
    * role: create Client

    * comments:
    */
    public function create()
    {
        return view('admin.pages.client.add');
    }


    /*
    * role: Save Client

    * comments:
    */
    public function save(Request $request)
    {
        // image validation
        $validator =  \Validator::make($request->all(),[
           'client_image'    => 'mimes:jpg,jpeg,png',
        ]);
        if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }

       $client = (new Client())->saveclient($request);

        return redirect()->route('admin.clients');
    }


    /*
    * role: Change Client status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Client())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit Client

    * comments:
    */
    public function edit(Client $client)
    {
        return view('admin.pages.client.add', compact('client'));
    }


    /*
    * role: Delete Client

    * comments:
    */
    public function delete(Request $request)
    {
        (new Client())->deleteClient($request);

        return 'true';
    }
}
