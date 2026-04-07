 @extends('admin.layouts.app')

@push('url_title') About Us @if(isset($aboutus)) Edit @else Add @endif @endpush
@if(isset($aboutus))
  @section('title',  'Edit About-Us')
@else
  @section('title',  'Add About-Us')
@endif

@push('content')
<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="aboutus-form" role="form" method="POST" action="{{ route('admin.save.aboutus') }}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="aboutus_id" value="{{ old('id',isset($aboutus->id) ? $aboutus->id : '') }} ">

               
                <input type="hidden" name="old_image" value="{{ old('image',isset($aboutus->image) ? $aboutus->image : '') }} ">

                <div class="form-group">
                    <div class="col-sm-6">
                      <label>Title :- </label>
                          <input type="text" name="title" class="form-control" value="{{ old('title',isset($aboutus->title) ? $aboutus->title : '') }}" />
                    </div>
                </div> 

                  <div class="form-group">
                    <div class="col-sm-10">
                      <label>Description :- </label>
                          <textarea name="description" style="width: 59%;" class="form-control">{{ old('description',isset($aboutus->description) ? $aboutus->description : '') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-6">
                      <label>Select Image :- (567* 709px)</label><br />
                        @if(isset($aboutus->image))
                          <img src="{{ url('storage/'.$aboutus->image) }}" height="80px" width="80px"><br /><br />
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
                      <a href="{{ route('admin.aboutus') }}"><button type="button" class="btn btn-warning">Cancel</a>
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
  $("#aboutus-form").validate({
    rules: {
            title        : 'required',
            image        : 'mimes:jpg,jpeg,png|max:1024',
            description  : 'required',
      },
      messages: {
        title        : 'This field is required.',
        image        :'Only PNG , JPEG , JPG, GIF File Allowed"',
        description  : 'This field is required.'

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
