 @extends('admin.layouts.app')

@push('url_title') Team Member @if(isset($teammember)) Edit @else Add @endif @endpush
@if(isset($teammember))
  @section('title',  'Edit Team Member')
@else
  @section('title',  'Add Team Member')
@endif

@push('content')
<div class="content">
    <div class="row ">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="member-form" role="form" method="POST" action="{{ route('admin.save.member') }}" enctype="multipart/form-data">
                @csrf
               
                <input type="hidden" name="member_id" value="{{ old('id',isset($member->id) ? $member->id : '') }} ">

                <input type="hidden" name="old_image" value="{{ old('image',isset($member->image) ? $member->image : '') }} ">

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Name :- </label>
                          <input type="text" name="name" class="form-control" value="{{ old('name',isset($member->name) ? $member->name : '') }}" />
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Role :- </label>
                          <input type="text" name="role" class="form-control" value="{{ old('role',isset($member->role) ? $member->role : '') }}" />
                    </div>
                </div> 

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Select Image :- (234 * 200px)</label><br />
                      @if(isset($member->image))
                            <img src="{{ \Storage::url($member->image) }}" height="80px" width="80px"><br /><br />
                            <input type="file" class="filestyle" name="member_image" id=""
                             accept="image/jpg, image/png, image/gif, image/jpeg" />
                              @if(count($errors) > 0)
                                  @foreach($errors->all() as $error)
                                     <span style="color:red">{{ $error }}</span>
                                  @endforeach
                              @endif
                      @else
                          <input type="file" class="filestyle" name="member_image" id=""
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
                      <a href="{{ route('admin.members') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
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
  $("#member-form").validate({
    rules: {
        title                : 'required',
        project_image        : 'required|mimes:jpg,jpeg,png|max:1024',
      },
      messages: {
        title         : 'This field is required.',
        project_image :'Only PNG , JPEG , JPG, GIF File Allowed"',
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
