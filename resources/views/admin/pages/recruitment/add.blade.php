 @extends('admin.layouts.app')

@push('url_title') Recruitment @if(isset($recruitment)) Edit @else Add @endif @endpush
@if(isset($recruitment))
  @section('title',  'Edit Recruitment')
 @else
     @section('title', 'Add Recruitment')
 @endif

 @push('content')
     <div class="content">
         <div class="row ">
             <div class="col-md-12">
                 <div class="card-box">
                     <div class="row form-horizontal">
                         <form class="form-horizontal" id="recruitment-form" role="form" method="POST"
                             action="{{ route('admin.save.recruitment') }}" enctype="multipart/form-data">
                             @csrf

                             <input type="hidden" name="recruitment_id"
                                 value="{{ old('id', isset($recruitment->id) ? $recruitment->id : '') }} ">

                             <div class="form-group">
                                 <div class="col-sm-6">
                                     <labe>Title :- </label>
                                         <input type="text" name="title" class="form-control"
                                             value="{{ old('title', isset($recruitment->title) ? $recruitment->title : '') }}" />
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-6">
                                     <labe>Place :- </label>
                                         <input type="text" name="place" class="form-control"
                                             value="{{ old('place', isset($recruitment->place) ? $recruitment->place : '') }}" />
                                 </div>
                             </div>

                             <div class="form-group">
                                 <div class="col-sm-10">
                                     <labe>Description :- </label>
                                         <textarea id="description" name="description" class="form-control">{{ old('description', isset($recruitment->description) ? $recruitment->description : '') }}</textarea>
                                 </div>
                             </div>


                             <div class="form-group clearfix">
                                 <div class="col-lg-10">
                                     <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                     <a href="{{ route('admin.recruitments') }}"><button type="button"
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

             // Load TinyMCE (CDN) if not already loaded
             if (typeof tinymce === 'undefined') {
                 var s = document.createElement('script');
                 s.src =
                     'https://cdn.tiny.cloud/1/3w5xycsvvxnkz7ejs8xh0imgm6vtzjox5nxs1ok6t0xk3haw/tinymce/6/tinymce.min.js';
                 s.referrerPolicy = 'origin';
                 s.onload = function() {
                     tinymce.init({
                         selector: '#description',
                         height: 300,
                         menubar: false,
                         plugins: 'link lists table paste wordcount code',
                         toolbar: 'undo redo | formatselect | bold italic underline | alignleft aligncenter alignright | bullist numlist outdent indent | link | code'
                     });
                 };
                 document.head.appendChild(s);
             } else {
                 tinymce.init({
                     selector: '#description'
                 });
             }

             //Form submit
             $("#recruitment-form").validate({
                 rules: {
                     title: 'required',
                     description: 'required',
                 },
                 messages: {
                     title: 'This field is required.',
                     description: 'This field is required.',
                 },
                 submitHandler: function(form) {
                     if ($(form).valid()) {
                         if (typeof tinymce !== 'undefined') tinymce.triggerSave();
                         form.submit();
                     }
                 }
             });
         });
     </script>
 @endpush
