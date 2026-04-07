 @extends('admin.layouts.app')

@push('url_title') Blog @if(isset($blog)) Edit @else Add @endif @endpush
@if(isset($blog))
  @section('title',  'Edit Blog')
@else
  @section('title',  'Add Blog')
@endif

@push('content')


<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="blog-form" role="form" method="POST" action="{{ route('admin.save.blog') }}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="blog_id" value="{{ old('id',isset($blog->id) ? $blog->id : '') }} ">

                @if(isset($blog->blog_image))
                    @foreach($blog->blog_image as $key => $image)
                <input type="hidden" name="old_image" value="{{ old('image',isset($blog->image) ? $blog->image : '') }} ">
                  @endforeach
                @endif
                
                <div class="form-group">
                    <div class="col-sm-6">
                      <labe><b>Blog Title</b> :- </label>
                          <input type="text" name="title" class="form-control" value="{{ old('title',isset($blog->title) ? $blog->title : '') }}" />
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe><b>Short Description</b> :- </label>
                          <input type="text" name="description" class="form-control" value="{{ old('title',isset($blog->description) ? $blog->description : '') }}" />
                    </div>
                </div> 
                
                <div class="form-group">
                    <div class="col-sm-6">
                        <labe><b>Description</b> :- </label>
                         <textarea name="blog_long_description" style="width: 59%;" class="form-control">{{ old('blog_long_description',isset($blog->blog_long_description) ? $blog->blog_long_description : '') }}</textarea>
                    </div>
                </div> 
                <div class="form-group">
                    <div class="col-sm-6">
                        <label for="blog_category">Select Blog Category:</label>
                        <select name="category" id="category">
                            <option value="fire_safety_chronicles" {{ old('category',isset($blog->category) && ($blog->category =='fire_safety_chronicles') ? $sel='selected' : $sel='') }}>Fire Safety Chronicles</option>
                            <option value="central_blog" {{ old('category',isset($blog->category) && ($blog->category =='central_blog') ? $sel='selected' : $sel='') }}>Central Blog</option>
                            <option value="topic_of_month" {{ old('category',isset($blog->category) && ($blog->category =='topic_of_month') ? $sel='selected' : $sel='') }}>Topic Of The Month</option>
                        </select>
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe><b>Select Image</b> :- Cental Category - 1440*640  / Other Category - 800*400</label><br/>
                      @if(isset($blog->blog_image))
                           @foreach($blog->blog_image as $key => $image)
                            <img src="{{ \Storage::url($image->image) }}" height="80px" width="80px"><br /><br />
                            <input type="file" class="filestyle" name="blog_image" id=""
                             accept="image/jpg, image/png, image/gif, image/jpeg" />

                             <input type="hidden" name="blogimage_id" class="form-control" value="{{ $image->id }}">

                              @if(count($errors) > 0)
                                  @foreach($errors->all() as $error)
                                     <span style="color:red">{{ $error }}</span>
                                  @endforeach
                              @endif
                            @endforeach
                      @else
                          <input type="file" class="filestyle" name="blog_image" id=""
                           accept="image/jpg, image/png, image/gif, image/jpeg" required/>
                           @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                   <span style="color:red">{{ $error }}</span>
                                @endforeach
                            @endif
                      @endif
                    </div>
                </div> 
 
                <div class="form-group clearfix">
                  <div class="col-lg-10">
                    <button type="submit"  class="btn btn-success waves-effect waves-light">Save</button>
                      <a href="{{ route('admin.blogs') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
    </div>
</div>
@endpush

@push('js')

<script type="text/javascript">

  $(document).ready(function () {

    //Form submit
  $("#blog-form").validate({
    rules: {
        title                : 'required',
        blog_image           : 'required|mimes:jpg,jpeg,png|max:1024',
        description          : 'required',
        blog_long_description : 'required',
        category : 'required',
      },
      messages: {
        title         : 'This field is required.',
        blog_image    :'Only PNG , JPEG , JPG, GIF File Allowed"',
        description   : 'This field is required.',
        blog_long_description   : 'This field is required.'
        category : 'This field is required.'

      },
    submitHandler: function(form){
      if($(form).valid()){
        form.submit();
      }
    }
  });
  });
</script>

@endpush
