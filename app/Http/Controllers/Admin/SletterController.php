<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Sletter;

class SletterController extends Controller
{
     /*
        * Sletter: Display resources

        * comments:
    */
   public function all()
   {
    
        return view('admin.pages.sletter.list');

   }

   /*
        * Homepage : Listing Sletter

        * comments:
    */
   public function listing(Request $request)
   {

        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));


       $sletters = Sletter::orderBy('id','ASC');

       $search = $request['search']['value'];
            if(!empty($search)) {
                $sletters->where('email', "like", "%".$search."%");
                    }

        $count = (clone $sletters)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();

        $sletters->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $sletters = $sletters->get();

       foreach ($sletters as $key => $sletter) {

            $records['data'][] = [
                'id'            => $key+1,
                'email'         => $sletter->email,
                'status'        => view('admin.shared.action', ['statusshow' => true, 'id' => $sletter->id, 'routeName' => 'admin.sletter', 'status' => $sletter->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action'        => view('admin.shared.action')->with(['id' => $sletter->id, 'routeName' => 'admin.sletter','view' => false, 'edit' => false])->render(),
            ];
       }
       return $records;

   }


     /*
    * role: Change Sletter status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Sletter())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Delete Sletter

    * comments:
    */
    public function delete(Request $request)
    {
        
        (new Sletter())->deleteSletter($request);

        return 'true';
    }
}
