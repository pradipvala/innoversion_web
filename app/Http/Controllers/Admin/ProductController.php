<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
Use App\Models\Image;
use App\Models\ProductCategory;
use App\Models\Brands;
use App\Models\BrandProduct;
use DB;
use Intervention\Image\Facades\Image as image2;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /*
     * Product: Display resources

     * comments:
     */

    public function all()
    {
        return view('admin.pages.product.list');
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
        $products = Product::orderBy('id', 'DESC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search))
        {
            $products->where('title', "like", "%" . $search . "%")->orWhere('description', "like", "%" . $search . "%")->orWhere('created_at', "like", "%" . $search . "%");
        }

        $count = (clone $products)->count();

        $records["recordsTotal"]    = $count;
        $records["recordsFiltered"] = $count;
        $records['data']            = [];

        $products->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $products = $products->get();

        foreach ($products as $key => $product)
        {
            $records['data'][] = [
                'id'          => $key + 1,
                'name'        => ucwords($product->title),
                'description' => $product->description,
                'image'       => '<img src="' . (isset($product->product_image) && !empty($product->product_image[0]->image) ? \Storage::url($product->product_image[0]->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                'created_at'  => \Carbon\Carbon::parse($product->created_at)->format('d-m-Y'),
                'status'      => view('admin.shared.action', ['statusshow' => true, 'id' => $product->id, 'routeName' => 'admin.product', 'status' => $product->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                'action'      => view('admin.shared.action')->with(['id' => $product->id, 'routeName' => 'admin.product', 'view' => false])->render(),
                'brands'      => view('admin.shared.brands')->with(['id' => $product->id, 'routeName' => 'admin.brandproduct.list'])->render(),
            ];
        }
        return $records;
    }

    /*
     * role: create Product

     * comments:
     */

    public function create()
    {
        $categories = ProductCategory::where('parent_id', '0')->get();

        // Get the category ids for subcategories
        $categoryIds = $categories->pluck('id');

        // Get the subcategories using category ids
        $subCategories = ProductCategory::whereIn('parent_id', $categoryIds)->get();

        // Get the brands for product
        $brands = Brands::where('status', '1')->get();



        // $product = Product::where('status','1')->get();
        // dd($product);

        return view('admin.pages.product.add', compact('categories', 'subCategories', 'brands'));
    }

    /*
     * role: Save Product

     * comments:
     */

    public function save(Request $request)
    {
        //  // image validation
        // $validator =  \Validator::make($request->all(),[
        //    'product_image'    => 'mimes:jpg,jpeg,png',
        // ]);
        // if($validator->fails()){
        //     return back()->withErrors($validator->errors())->withInput();
        // }

        $product = (new Product())->saveProduct($request);

        (new Image())->saveProductimage($request, 'App\Models\Product', $product);

        return redirect()->route('admin.products');
    }

    /*
     * role: Change Product status.

     * comments:
     */

    public function changeStatus(Request $request)
    {
        (new Product())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }

    /*
     * role: Edit Product

     * comments:
     */

    public function edit(Product $product)
    {
        $product = isset($product) && !empty($product) ? $product : NULL;

        $category_id = isset($product->category_id) && !empty($product->category_id) ? $product->category_id : NULL;



        $sub_category_parent_id = ProductCategory::where('id', $category_id)->select('parent_id')->first();

        $parent_cat_id = isset($sub_category_parent_id->parent_id) && !empty($sub_category_parent_id->parent_id) ? $sub_category_parent_id->parent_id : NULL;

        // dd($parent_cat_id);

        $categories = ProductCategory::where('parent_id', '0')->get();



        // Get the category ids for subcategories
        $categoryIds = $categories->pluck('id');


        // Get the subcategories using category ids
        $subCategories = ProductCategory::whereIn('parent_id', $categoryIds)->get();

        // Get the brands for product
        $brands = Brands::where('status', '1')->get();


        return view('admin.pages.product.add', compact('categories', 'subCategories', 'brands', 'product', 'category_id', 'parent_cat_id'));
    }

    /*
     * role: Delete Product

     * comments:
     */

    public function delete(Request $request)
    {
        (new Product())->deleteProduct($request);

        return 'true';
    }

    /*
     * role: Delete Product Image

     * comments:
     */

    public function deleteImage(Request $request)
    {
        (new Image())->deleteimage($request->product_id);

        return 'true';
    }

    public function saveBrandProduct1($request, $product, $brandId)
    {
        $brandProduct = new BrandProduct;

        $brandProduct->product_id  = $product;
        $brandProduct->brand_id    = $brandId;
        $brandProduct->title       = $request->brand_title[$brandId];
        $brandProduct->description = $request->brand_description[$brandId];

        // Save brand-related image if needed
//        if ($request->hasFile("brand_image.{$brandId}")) {
//            $imagePath = $request->file("brand_image.{$brandId}")->store('brand_product', 'public');
//            $brandProduct->image = $imagePath;
//        }

        if ($request->hasFile("brand_image.{$brandId}"))
        {
            $image = $request->file("brand_image.{$brandId}");

            // Get image details
            $originalPath = $image->getRealPath();
            $extension    = $image->getClientOriginalExtension();
            $filename     = uniqid('brand_') . '.' . $extension;
            $savePath     = storage_path("app/public/brand_product/{$filename}");

            // Load the image based on type
            switch (strtolower($extension))
            {
                case 'jpg':
                case 'jpeg':
                    $srcImage = imagecreatefromjpeg($originalPath);
                    break;
                case 'png':
                    $srcImage = imagecreatefrompng($originalPath);
                    break;
                case 'gif':
                    $srcImage = imagecreatefromgif($originalPath);
                    break;
                default:
                    throw new \Exception("Unsupported image type.");
            }

            // Create a new true color image (200x200)
            $resizedImage = imagecreatetruecolor(100, 100);

            // Preserve transparency for PNG and GIF
            if (in_array(strtolower($extension), ['png', 'gif']))
            {
                imagecolortransparent($resizedImage, imagecolorallocatealpha($resizedImage, 0, 0, 0, 127));
                imagealphablending($resizedImage, false);
                imagesavealpha($resizedImage, true);
            }

            // Resize the image
            $srcWidth  = imagesx($srcImage);
            $srcHeight = imagesy($srcImage);
            imagecopyresampled($resizedImage, $srcImage, 0, 0, 0, 0, 100, 100, $srcWidth, $srcHeight);

            // Save the resized image
            switch (strtolower($extension))
            {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($resizedImage, $savePath, 90);
                    break;
                case 'png':
                    imagepng($resizedImage, $savePath);
                    break;
                case 'gif':
                    imagegif($resizedImage, $savePath);
                    break;
            }

            // Clean up memory
            imagedestroy($srcImage);
            imagedestroy($resizedImage);

            // Save path for DB (relative to public disk)
            $brandProduct->image = "brand_product/{$filename}";
        }

        $brandProduct->save();
    }

    public function brandproduct($id)
    {
        $brandproducts = BrandProduct::where('product_id', '=', $id)->get();

        return view('admin.pages.product.brand')->with(['brandproducts' => $brandproducts, 'id' => $id]);
    }

    public function createbrandproduct($id)
    {
        $brands = Brands::where('status', '1')->whereNotNull('name')->get();

        return view('admin.pages.product.brand_add')->with(['id' => $id, 'brands' => $brands]);
    }

    public function storebrandproduct(Request $request)
    {
        foreach ($request->brand_id as $brandId)
        {
            $this->saveBrandProduct1($request, $request->product, $brandId);
        }

        return redirect()->route('admin.brandproduct.list', ['id' => $request->product]);
    }

    public function brandproductedit($id)
    {
        $brandproduct = BrandProduct::where('id', '=', $id)->first();

        return view('admin.pages.product.brand_edit')->with(['brandproduct' => $brandproduct]);
    }

    public function brandproductupdate(BrandProduct $brandproduct, Request $request)
    {

        $brandproduct->title       = $request->brand_title;
        $brandproduct->description = $request->brand_description;

//        // Save brand-related image if needed
//        if ($request->hasFile("brand_image"))
//        {
//            $imagePath           = $request->file("brand_image")->store('brand_product', 'public');
//            $brandproduct->image = $imagePath;
//        }
        if ($request->hasFile("brand_image"))
        {
            $image = $request->file("brand_image");

            // Get original path and extension
            $originalPath = $image->getRealPath();
            $extension    = strtolower($image->getClientOriginalExtension());
            $filename     = uniqid('brand_') . '.' . $extension;
            $savePath     = storage_path("app/public/brand_product/{$filename}");

            // Create image from uploaded file
            switch ($extension)
            {
                case 'jpg':
                case 'jpeg':
                    $srcImage = imagecreatefromjpeg($originalPath);
                    break;
                case 'png':
                    $srcImage = imagecreatefrompng($originalPath);
                    break;
                case 'gif':
                    $srcImage = imagecreatefromgif($originalPath);
                    break;
                default:
                    throw new \Exception("Unsupported image type: " . $extension);
            }

            // Create 200x200 canvas
            $resizedImage = imagecreatetruecolor(100, 100);

            // Handle transparency for PNG/GIF
            if (in_array($extension, ['png', 'gif']))
            {
                imagecolortransparent($resizedImage, imagecolorallocatealpha($resizedImage, 0, 0, 0, 127));
                imagealphablending($resizedImage, false);
                imagesavealpha($resizedImage, true);
            }

            // Resize
            $srcWidth  = imagesx($srcImage);
            $srcHeight = imagesy($srcImage);
            imagecopyresampled($resizedImage, $srcImage, 0, 0, 0, 0, 100, 100, $srcWidth, $srcHeight);

            // Save resized image
            switch ($extension)
            {
                case 'jpg':
                case 'jpeg':
                    imagejpeg($resizedImage, $savePath, 90);
                    break;
                case 'png':
                    imagepng($resizedImage, $savePath);
                    break;
                case 'gif':
                    imagegif($resizedImage, $savePath);
                    break;
            }

            // Free memory
            imagedestroy($srcImage);
            imagedestroy($resizedImage);

            // Save path in database (relative to 'public' disk)
            $brandproduct->image = "brand_product/{$filename}";
        }

        $brandproduct->save();
        $brandproducts = BrandProduct::where('product_id', '=', $brandproduct->product_id)->get();
        return redirect()->route('admin.brandproduct.list', ['id' => $brandproduct->product_id]);
    }

    public function brandproductdestroy($id)
    {
        $brandproduct = BrandProduct::where('id', '=', $id)->first();

        $product_id = $brandproduct->product_id;
        $brandproduct->delete();

//         return 'true';

        return redirect()->route('admin.brandproduct.list', ['id' => $product_id]);
    }

}
