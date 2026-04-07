 @extends('admin.layouts.app')

 @push('url_title') Add Project   @endpush
     

@section('title', 'Add Project')

 @push('content')
     <div class="content">
         <div class="row ">
             <div class="col-md-12">
                 <div class="card-box">
                     <div class="row form-horizontal">
                         <form class="form-horizontal" id="project-form" role="form" method="POST"
                             action="{{ route('admin.save.project') }}" enctype="multipart/form-data">
                             @csrf

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Title :- </label>
                                    <input type="text" name="title" class="form-control" required/>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Short Description  :-</label>
                                    <textarea id="description" name="description" class="form-control" rows="4" cols="20" /></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select Image :- (263 * 276px)</label><br />
                                        <input type="file" class="filestyle" name="project_image" id="project_image"
                                         accept="image/jpg, image/png, image/gif, image/jpeg" required />
                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $error)
                                                <span style="color:red">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                </div>
                            </div>

                             <div class="form-group clearfix">
                                 <div class="col-lg-10">
                                     <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                     <a href="{{ route('admin.projects') }}"><button type="button"
                                             class="btn btn-warning">Cancel</button></a>
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
         $(document).ready(function() {

             //Form submit
             $("#project-form").validate({
                 rules: {
                     title: 'required',
                     project_image: 'required|mimes:jpg,jpeg,png,gif|max:1024',
                 },
                 messages: {
                     title: 'This field is required.',
                     project_image: 'Only PNG , JPEG , JPG, GIF File Allowed"',
                 },
                 submitHandler: function(form) {
                     if ($(form).valid()) {
                         form.submit();
                     }
                 }
             });
         });
     </script>
 @endpush
