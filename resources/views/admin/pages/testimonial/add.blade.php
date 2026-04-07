 @extends('admin.layouts.app')

 @push('url_title') Testimonial @if (isset($testimonial))
     Edit
 @else
     Add
 @endif @endpush
 @if (isset($testimonial))
     @section('title', 'Edit Testimonial')
 @else
     @section('title', 'Add Testimonial')
 @endif

 @push('content')
     <div class="content">
         <div class="row ">
             <div class="col-md-12">
                 <div class="card-box">
                     <div class="row form-horizontal">
                         <form class="form-horizontal" id="testimonial-form" role="form" method="POST"
                             action="{{ route('admin.save.testimonial') }}" enctype="multipart/form-data">
                             @csrf

                             <input type="hidden" name="testimonial_id"
                                 value="{{ old('id', isset($testimonial->id) ? $testimonial->id : '') }} ">


                             <input type="hidden" name="old_image"
                                 value="{{ old('image', isset($testimonial->image) ? $testimonial->image : '') }} ">

                             <div class="form-group">
                                 <div class="col-sm-6">
                                     <label>Name :- </label>

                                     <textarea name="name" id="name" style="width: 59%;" class="form-control">{{ old('name', isset($testimonial->name) ? $testimonial->name : '') }}</textarea>
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                     <label>Description :- </label>
                                     <textarea name="description" style="width: 59%;" class="form-control">{{ old('description', isset($testimonial->description) ? $testimonial->description : '') }}</textarea>
                                 </div>
                             </div>

                             <div class="form-group clearfix">
                                 <div class="col-lg-10">
                                     <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                     <a href="{{ route('admin.testimonials') }}"><button type="button"
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
         function initCKEditor(selector) {
             ClassicEditor
                 .create(document.querySelector(selector))
                 .catch(error => {
                     console.error(error);
                 });
         }

         initCKEditor('#name');
         $(document).ready(function() {

             //Form submit
             $("#testimonial-form").validate({
                 rules: {
                     name: 'required',
                     description: 'required',
                 },
                 messages: {
                     testimonial_name: 'This field is required.',
                     description: 'This field is required.'

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
