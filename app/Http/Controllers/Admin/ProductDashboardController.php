<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductDashboardController extends Controller
{

    public function __construct(){
        $this->middleware('permission:show-product-create', ['only' => ['create']]);
        $this->middleware('permission:show-product-edit', ['only' => ['edit']]);
        $this->middleware('permission:show-product-view', ['only' => ['view']]);
        $this->middleware('permission:show-product-delete', ['only' => ['delete']]);
    }


    public function index(Request $request)
    {
        
        $products = Product::where(['status'=>'1'])->get();
        // dd($products);

        // foreach ($products as $key => $product) {
            
        //     if(isset($product->product_image[$key]) && !empty($product->product_image[$key])){

        //         echo "<pre>";print_r($product->product_image[$key]->image);echo "<br>";
        //     }else{
        //          echo "<pre>";print_r($product->product_image[0]->image);echo "<br>";
        //     }
            

            // $product_image='<img src="' . (isset($product->product_image) && !empty($product->product_image[0]->image) ?  \Storage::url($product->product_image[0]->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />';

            // dd($product_image);

        // }
        // exit;
        
        return view('admin.pages.innoversion_dashboard.products_dashboard', compact('products'));

    }

    public function show(Request $request,$id)
    {
        $products_data = Product::where(['id'=>$id, 'status' => '1'])->get();

        $id=isset($id)&&!empty($id)?$id:NULL;

        return view('admin.pages.innoversion_dashboard.products_details', compact('products_data','id'));

    }
}

