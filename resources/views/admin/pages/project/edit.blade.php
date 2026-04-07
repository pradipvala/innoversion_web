 @extends('admin.layouts.app')

 @push('url_title') Edit Project @endpush

@section('title', 'Edit Project')

 @push('content')

 <?php //dd($project->id); ?>
     <div class="content">
         <div class="row ">
             <div class="col-md-12">
                 <div class="card-box">
                     <div class="row form-horizontal">
                         <form class="form-horizontal" id="project-form" role="form" method="POST" action="{{ route('admin.project.update',['id'=>$project->id]) }}" enctype="multipart/form-data">
                            @csrf
                           <input type="hidden" name="project_id" value="{{ isset($project->id) ? $project->id : '' }} ">

                           


                             <div class="form-group">
                                 <div class="col-sm-6">
                                     <label>Title :- </label>
                                     <input type="text" name="title" class="form-control"
                                         value="{{ isset($project->title) && !empty($project->title) ? $project->title : '' }}" />
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-6">
                                     <label>Short Description  :-</label>
                                     <textarea id="description" name="description" class="form-control" rows="4" cols="20" />{{  isset($project->description) &&!empty($project->description) ? $project->description : '' }}</textarea>
                                </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-6">
                                     <label>Select Image :- (263 * 276px)</label><br />
                                     @if(isset($project->project_image) && !empty($project->project_image))
                                         
                                             <img src="{{ $project->project_image ?? '' }}" height="80px"
                                                 width="80px"><br /><br />
                                             <input type="file" class="filestyle" name="project_image" id="project_image"
                                                 accept="image/jpg, image/png, image/gif, image/jpeg" />

                                             <input type="hidden" name="project_image_path" class="form-control"
                                                 value="{{  $project->project_image }}">
                                             @if (count($errors) > 0)
                                                 @foreach ($errors->all() as $error)
                                                     <span style="color:red">{{ $error }}</span>
                                                 @endforeach
                                             @endif
                                        
                                     @else
                                         <input type="file" class="filestyle" name="project_image" id="project_image"
                                             accept="image/jpg, image/png, image/gif, image/jpeg" required />
                                         @if (count($errors) > 0)
                                             @foreach ($errors->all() as $error)
                                                 <span style="color:red">{{ $error }}</span>
                                             @endforeach
                                         @endif
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
                     project_image: 'required|mimes:jpg,jpeg,png|max:1024',
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
