<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductCategoryB2c;
use Illuminate\Support\Str;
class CategoryB2cController extends Controller
{
    public function index()
    {
        return view('admin.pages.category_b2c.list');
    }

    public function listing(Request $request)
    {
        $parentId = 0;

        extract($this->DTFilters($request->all()));

        $categories = (new ProductCategoryB2c())->allCategories($parentId);
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
                'action' => view('admin.shared.action')->with(['id' => $category->id,'parent_id' => $parentId, 'routeName' => 'admin.categories.b2c', 'view' => false,'category_edit' => true,'edit' => false])->render(),
                'sub_category' => view('admin.shared.subcategory')->with(['id' => $category->id, 'routeName' => 'admin.sub.categories.b2c'])->render(),
            ];
        }
        return $records;

    }

    public function create()
    {
        return view('admin.pages.category_b2c.add');
    }
    public function save(Request $request)
    {

        $category = new ProductCategoryB2c();
        $category->category_name = $request->category_name;
        $slug = Str::slug( $request->category_name);
        $category->slug = $slug;
        $category->status = 1;
        $category->parent_id = 0;

        $category->save();
        return redirect()->back();
    }


    public function update(Request $request,ProductCategoryB2c $category)
    {


        $category->category_name = $request->category_name;
        $slug = Str::slug( $request->category_name);
        $category->slug = $slug;
        $category->status = 1;
        $category->parent_id = 0;

        $category->save();
        return redirect()->route('admin.categories.b2c');
    }

    public function delete(Request $request,ProductCategoryB2c $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.b2c');
    }





    public function edit(Request $request,ProductCategoryB2c $category)
    {

        return view('admin.pages.category_b2c.edit')->with(['category'=>$category]);
    }



    public function create_sub()
    {
        $categories = ProductCategoryB2c::where('parent_id','=',0)->get();
        return view('admin.pages.sub_category_b2c.add')->with(['categories'=>$categories]);
    }
    public function save_sub(Request $request)
    {

        $category = new ProductCategoryB2c();
        $category->category_name = $request->category_name;
        $slug = Str::slug( $request->category_name);
        $category->slug = $slug;
        $category->status = 1;
        $category->parent_id = $request->parent_id;
        $category->save();
        return redirect()->back();
    }
    public function index_sub($parentId)
    {
        return view('admin.pages.sub_category_b2c.list')->with(['parentId'=>$parentId]);
    }


    public function sub_categories_b2c_listing(Request $request,$parentId)
    {


        extract($this->DTFilters($request->all()));

        $categories = ProductCategoryB2c::where('parent_id','=',$parentId);
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
                'action' => view('admin.shared.action')->with(['id' => $category->id,'parent_id' => $parentId, 'routeName' => 'admin.sub.categories.b2c', 'view' => false,'category_edit' => true,'edit' => false])->render(),

            ];
        }
        return $records;

    }

    public function edit_sub(Request $request,ProductCategoryB2c $category)
    {
        $categories = ProductCategoryB2c::where('parent_id','=',0)->get();
        return view('admin.pages.sub_category_b2c.edit')->with(['category1'=>$category,'categories'=>$categories]);
    }

    public function update_sub(Request $request,ProductCategoryB2c $category)
    {


        $category->category_name = $request->category_name;
        $slug = Str::slug( $request->category_name);
        $category->slug = $slug;
        $category->status = 1;
        $category->parent_id = $request->parent_id;

        $category->save();
        return redirect()->route('admin.sub.categories.b2c',['parentId'=>$category->parent_id]);
    }


    public function delete_sub(Request $request,ProductCategoryB2c $category)
    {
        $category->delete();
        return redirect()->route('admin.sub.categories.b2c');
    }


}
