<?php

namespace App\Http\Controllers\Home_Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
Use App\Models\Image;
use App\Models\ProductCategory;

use DB;

class ProductController extends Controller
{

    public function __construct(){
        $this->middleware('permission:new-product-create', ['only' => ['create']]);
        $this->middleware('permission:new-product-edit', ['only' => ['edit']]);
        $this->middleware('permission:new-product-view', ['only' => ['view']]);
        $this->middleware('permission:new-product-delete', ['only' => ['delete']]);
    }

    public function all()
    {
        return view('frontend.product.list');
    }

    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion
        extract($this->DTFilters($request->all()));

        // get data from Product table
        $products = Product::orderBy('id', 'DESC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $products->where('title', "like", "%" . $search . "%")->orWhere('description', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
            
            
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
                    'image' => '<img src="' . (isset($product->image) && !empty($product->image) ?  \Storage::url($product->image) : asset('frontend_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    'created_at' => \Carbon\Carbon::parse($product->created_at)->format('d-m-Y'),
                    'status' => view('frontend.shared.action', ['statusshow' => true, 'id' => $product->id, 'routeName' => 'product', 'status' => $product->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                    'action' => view('frontend.shared.action')->with(['id' => $product->id, 'routeName' => 'product', 'view' => false])->render(),
                ];
        }
        return $records;
    }


    public function create()
    {
        return view('frontend.product.add');
    }


    public function save(Request $request)
    {

         // image validation
         $validator =  \Validator::make($request->all(),[
            'image'    => 'mimes:jpg,jpeg,png',
         ]);
         if($validator->fails()){
             return back()->withErrors($validator->errors())->withInput();
         }

        $product = (new Product())->saveProduct($request);

        return redirect()->route('home_products');
    }


     public function changeStatus(Request $request)
    {
        (new Product())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    public function edit(Product $product)
    {
        $product=isset($product)&&!empty($product)?$product:NULL;
        
        return view('frontend.product.add', compact('product'));
    }


    public function delete(Request $request)
    {
        (new Product())->deleteProduct($request);

        return 'true';
    }


   


}

