<?php

namespace App\Http\Controllers\Home_Dashboard;

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
        // dd($request);
        $products = Product::where('status','1')->get();
        
        return view('innoversion_dashboard.products_dashboard', compact('products'));

    }

    public function show(Request $request,$id)
    {
        // dd($id);
        $products_data = Product::where(['id'=>$id, 'status' => '1'])->get();

        return view('innoversion_dashboard.products_details', compact('products_data'));

    }
}
