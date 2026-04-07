@extends('admin.layouts.app')

@push('url_title') Certificate @if(isset($certificate)) Edit @else Add @endif @endpush
@if(isset($certificate))
  @section('title',  'Edit Certificate')
@else
  @section('title',  'Add Certificate')
@endif

@push('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="certificate-form" role="form" method="POST" action="{{ route('admin.save.certificate') }}" enctype="multipart/form-data">
                @csrf
                <!-- To get a category id of categories table for update-->
                <input type="hidden" name="certificate_id" value="{{ old('id',isset($certificate->id) ? $certificate->id : '') }} ">

                <!-- Get the old Image when update the Slider-->
                <input type="hidden" name="old_image" value="{{ old('image',isset($certificate->image) ? $certificate->image : '') }} ">
              

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Select Image :-</label><br />
                        @if(isset($certificate->image))
                            <img src="{{ \Storage::url($certificate->image) }}" height="80px" width="80px"><br /><br />
                            <input type="file" class="filestyle" name="certificate_image" id=""
                             accept="image/jpg, image/png, image/gif, image/jpeg" />

                              @if(count($errors) > 0)
                                  @foreach($errors->all() as $error)
                                     <span style="color:red">{{ $error }}</span>
                                  @endforeach
                              @endif
                            
                      @else
                          <input type="file" class="filestyle" name="certificate_image" id=""
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
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                      <a href="{{ route('admin.certificates') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
                  </div>
                </div>
              </form>
            </div>
        </div>
      </div>
   
 

@endpush

@push('js')

<script type="text/javascript">

  $(document).ready(function () {

    //Form submit
  $("#certificate-form").validate({
    rules: {
        certificate_image : 'required|mimes:jpg,jpeg,png|max:1024',
      },
      messages: {
        certificate_image :'Only PNG , JPEG , JPG, GIF File Allowed"',
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
