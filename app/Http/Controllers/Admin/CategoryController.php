<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategory;

class CategoryController extends Controller
{
     /*
        * Category: Display resources

        * comments:
    */
    public function all($parentId)
    {

        if($parentId == '0'){
            return view('admin.pages.category.list');
        }
        else{
            return view('admin.pages.subcategory.list',compact('parentId'));
        }

    }


    /*
        * Category: Listing Categories

        * comments:
    */
    public function listing(Request $request, $parentId = 0)
    {

        extract($this->DTFilters($request->all()));

        $categories = (new ProductCategory())->allCategories($parentId);
        $search = $request['search']['value'] ?? null;
        if(!empty($search)) {
            $categories->where('category_name', "like", "%".$search."%");
        }
    
        $count = (clone $categories)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = array();

        $categories->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);
        $categories = $categories->get();
        foreach ($categories as $key => $category) {

            $records['data'][] = [
                'id' => $key + 1,
                'category_name' => ucwords($category->category_name),
                'created_at'    =>  \Carbon\Carbon::parse($category->created_at)->format('d-m-Y'),
                'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $category->id, 'routeName' => 'admin.categories', 'status' => $category->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action' => view('admin.shared.action')->with(['id' => $category->id,'parent_id' => $parentId, 'routeName' => 'admin.categories', 'view' => false,'category_edit' => true,'edit' => false])->render(),
                'sub_category' => view('admin.shared.subcategory')->with(['id' => $category->id, 'routeName' => 'admin.categories'])->render(),
            ];
        }
        return $records;
    }

    /*
    * role: Create category

    * comments:
    */
    public function create($parentId)
    {

        return view('admin.pages.category.add',compact('parentId'));
        
    }


    /*
    * role: Save category

    * comments:
    */
    public function save(Request $request)
    {

        (new ProductCategory())->saveCategory($request);

        return redirect()->route('admin.categories',['id' => $request->parent_id ?? '0']);
    }


    /*
    * role: Edit ProductCategory

    * comments:
    */
    public function edit(ProductCategory $category,$parentId = 0)
    {

        return view('admin.pages.category.add', compact('category','parentId'));
    }


    /*
    * role: Change App status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new ProductCategory())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Delete ProductCategory

    * comments:
    */
    public function delete(Request $request)
    {

        (new ProductCategory())->deleteCategory($request);

        return 'true';
    }
}
