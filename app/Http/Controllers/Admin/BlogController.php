<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Termwind\ValueObjects\list;
use App\Models\Image;
use App\Models\Blogs;

class BlogController extends Controller
{
    /*
        * Blog: Display resources

        * comments:
    */
    public function all()
    {
        $blog = Blogs::orderBy('created_at', 'DESC');
        return view('admin.pages.blog.list',compact('blog'));
    }

    /*
        * Homepage : Listing Blog

        * comments:
    */
    public function listing(Request $request)
    {
        // Dtf filters for datatable pagintion 
        extract($this->DTFilters($request->all()));

        // get data from blog table
        $blogs = Blogs::orderBy('created_at', 'DESC');

        // search in datatable
        $search = $request['search']['value'];
        if (!empty($search)) {
            $blogs->where('title', "like", "%" . $search . "%")
                    ->orWhere('description', "like", "%".$search."%")
                    ->orWhere('blog_long_description', "like", "%".$search."%")
                    ->orWhere('category', "like", "%".$search."%")
                    ->orWhere('created_at', "like", "%".$search."%");
        }

        $count = (clone $blogs)->count();

        $records["recordsTotal"] = $count;
        $records["recordsFiltered"] = $count;
        $records['data'] = [];

        $blogs->offset($offset)->limit($limit)->orderBy($sort_column, $sort_order);

        $blogs = $blogs->get();

        foreach ($blogs as $key => $blog) {
            foreach ($blog->blog_image as $key => $image) {
                $records['data'][] = [
                    'id' => $key + 1,
                    'name' => ucwords($blog->title),
                    'description' => $blog->description,
                    'blog_long_description' => $blog->blog_long_description,
                    'category' => ucwords($blog->category),
                    'image' => '<img src="' . (!empty($image->image) ? \Storage::url($image->image) : asset('admin_theme/assets/defaults/no-image.jpg')) . '" class="img-thumbnail" width="120" />',
                    'created_at' => \Carbon\Carbon::parse($blog->created_at)->format('d-m-Y'),
                    'status' => view('admin.shared.action', ['statusshow' => true, 'id' => $blog->id, 'routeName' => 'admin.blog', 'status' => $blog->status, 'view' => false, 'edit' => false, 'delete' => false])->render(),
                    'action' => view('admin.shared.action')->with(['id' => $blog->id, 'routeName' => 'admin.blog', 'view' => false])->render(),
                ];
            }
        }
        return $records;
    }


    /*
    * role: create Blog

    * comments:
    */
    public function create()
    {
        $blog = Blogs::orderBy('created_at', 'DESC');
        return view('admin.pages.blog.add',compact('blog'));
        // return view('admin.pages.blog.add');
    }


    /*
    * role: Save Blog

    * comments:
    */
    public function save(Request $request)
    {
        // image validation
        $validator =  \Validator::make($request->all(),[
           'blog_image'    => 'mimes:jpg,jpeg,png',
        ]);
        
         if($validator->fails()){
            return back()->withErrors($validator->errors())->withInput();
        }
       $blog = (new Blogs())->saveBlog($request);
 
        (new Image())->saveBlogimage($request,'App\Models\Blogs',$blog);

        return redirect()->route('admin.blogs');
    }


    /*
    * role: Change Blog status.

    * comments:
    */
    public function changeStatus(Request $request)
    {
        (new Blogs())->changeStatus($request);

        return response()->json(['status' => 'true', 'message' => "Status has been Changed."]);
    }


    /*
    * role: Edit BLog

    * comments:
    */
    public function edit(Blogs $blog)
    {
        return view('admin.pages.blog.add', compact('blog'));
    }


    /*
    * role: Delete Blog

    * comments:
    */
    public function delete(Request $request)
    {
        (new Blogs())->deleteBlog($request);

        return 'true';
    }
}
