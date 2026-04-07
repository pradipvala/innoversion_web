 @extends('admin.layouts.app')

@push('url_title') Service @if(isset($service)) Edit @else Add @endif @endpush
@if(isset($service))
  @section('title',  'Edit Service')
@else
  @section('title',  'Add Service')
@endif

@push('content')
<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="service-form" role="form" method="POST" action="{{ route('admin.save.service') }}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="service_id" value="{{ old('id',isset($service->id) ? $service->id : '') }} ">

                <input type="hidden" name="old_image" value="{{ old('image',isset($service->image) ? $service->image : '') }} ">

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Title :- </label>
                          <input type="text" name="title" class="form-control" value="{{ old('title',isset($service->title) ? $service->title : '') }}" />
                    </div>
                </div> 

                  <div class="form-group">
                    <div class="col-sm-10">
                      <labe>Description :- </label>
                          <textarea name="description" style="width: 59%;" class="form-control">{{ old('description',isset($service->description) ? $service->description : '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Select Image :- (362 * 241px)</label><br />
                        @if(isset($service->image))
                          <img src="{{ \Storage::url($service->image) }}" height="80px" width="80px"><br /><br />
                          <input type="file" class="filestyle" name="image" id=""
                           accept="image/jpg, image/png, image/gif, image/jpeg" />
                            @if(count($errors) > 0)
                                @foreach($errors->all() as $error)
                                   <span style="color:red">{{ $error }}</span>
                                @endforeach
                            @endif
                      @else
                          <input type="file" class="filestyle" name="image" id=""
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
                      <a href="{{ route('admin.services') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
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
  $("#service-form").validate({
    rules: {
        title                : 'required',
        image                : 'required|mimes:jpg,jpeg,png|max:1024',
        description          : 'required',
      },
      messages: {
        title         : 'This field is required.',
        image         :'Only PNG , JPEG , JPG, GIF File Allowed"',
        description   : 'This field is required.'

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
