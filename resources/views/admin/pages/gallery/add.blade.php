 @extends('admin.layouts.app')

@push('url_title') Gallery @if(isset($gallery)) Edit @else Add @endif @endpush
@if(isset($gallery))
  @section('title',  'Edit Gallery')
@else
  @section('title',  'Add Gallery')
@endif

@push('content')
<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="gallery-form" role="form" method="POST" action="{{ route('admin.save.gallery') }}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="gallery_id" value="{{ old('id',isset($gallery->id) ? $gallery->id : '') }} ">

                
                @if(isset($gallery->gallery_image))
                  @foreach($gallery->gallery_image as $key => $image)
                  <input type="hidden" name="old_image" value="{{ old('image',isset($image->image) ? $image->image : '') }} ">
                  @endforeach
                @endif

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Title :- </label>
                          <input type="text" name="title" class="form-control" value="{{ old('title',isset($gallery->title) ? $gallery->title : '') }}" />
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Select Image :- </label><br />
                      @if(isset($gallery->gallery_image))
                           @foreach($gallery->gallery_image as $key => $image)
                            <img src="{{ \Storage::url($image->image) }}" height="80px" width="80px"><br /><br />
                            <input type="file" class="filestyle" name="gallery_image" id=""
                             accept="image/jpg, image/png, image/gif, image/jpeg" />

                             <input type="hidden" name="galleryimage_id" class="form-control" value="{{ $image->id }}">

                              @if(count($errors) > 0)
                                  @foreach($errors->all() as $error)
                                     <span style="color:red">{{ $error }}</span>
                                  @endforeach
                              @endif
                            @endforeach
                      @else
                          <input type="file" class="filestyle" name="gallery_image" id=""
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
                      <a href="{{ route('admin.galleries') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
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
  $("#gallery-form").validate({
    rules: {
        title                : 'required',
        image                : 'required|mimes:jpg,jpeg,png|max:1024',
      },
      messages: {
        title         : 'This field is required.',
        image         :'Only PNG , JPEG , JPG, GIF File Allowed"',

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
