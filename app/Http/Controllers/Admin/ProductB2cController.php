<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductB2c;
Use App\Models\Image;
use App\Models\ProductCategoryB2c;
use App\Models\Brands;
class ProductB2cController extends Controller
{


    public function all()
    {
        return view('admin.pages.product_b2c.list');
    }

    /*
        * Homepage : Listing Product

        * comments:
    */
    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion
        extract($this->DTFilters($request->all()));

        // get data from Product table
        $products = ProductB2c::orderBy('id', 'ASC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $products->where('title', "like", "%" . $search . "%");
        }

        $count = (clone $products)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $products->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $products = $products->get();

        foreach ($products as $key => $product) {
                $records['data'][] = [
                    'id' => $key + 1,
                    'name' => ucwords($product->title),
                    'description' => $product->description,
                    'image' => '<img src="' . (isset($product->product_image1) && !empty($product->product_image1[0]->image) ?  asset('storage/app/public/' . $product->product_image1[0]->image): asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    'created_at' => \Carbon\Carbon::parse($product->created_at)->format('d-m-Y'),
                    'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $product->id, 'routeName' => 'admin.product', 'status' => $product->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                    'action' => view('admin.shared.action')->with(['id' => $product->id, 'routeName' => 'admin.product.b2c', 'view' => false])->render(),
                ];
        }
        return $records;
    }

    public function create()
    {
        $categories = ProductCategoryB2c::where('parent_id','0')->get();

        // Get the category ids for subcategories
        $categoryIds  = $categories->pluck('id');

        // Get the subcategories using category ids
        $subCategories = ProductCategoryB2c::whereIn('parent_id',$categoryIds)->get();

        // Get the brands for product
        $brands = Brands::where('status','1')->get();

        return view('admin.pages.product_b2c.add',compact('categories','subCategories','brands'));
    }

    public function save(Request $request)
    {
        //  // image validation
        // $validator =  \Validator::make($request->all(),[
        //    'product_image'    => 'mimes:jpg,jpeg,png',
        // ]);
        // if($validator->fails()){
        //     return back()->withErrors($validator->errors())->withInput();
        // }

       $product = (new ProductB2c())->saveProduct($request);

        (new Image())->saveProductimage($request,'App\Models\Productb2c',$product);

        return redirect()->route('admin.products.b2c');
    }
    public function edit(ProductB2c $product)
    {
         $categories = ProductCategoryB2c::where('parent_id','0')->get();

        // Get the category ids for subcategories
        $categoryIds  = $categories->pluck('id');

        // Get the subcategories using category ids
        $subCategories = ProductCategoryB2c::whereIn('parent_id',$categoryIds)->get();

        // Get the brands for product
        $brands = Brands::where('status','1')->get();


        return view('admin.pages.product_b2c.add', compact('product','categories','subCategories', 'brands'));
    }
}
