@extends('admin.layouts.app')

@push('url_title') Category @if(isset($category)) Edit @else Add @endif @endpush
@if(isset($category))
  @section('title',  'Edit Category')
@else
  @section('title',  'Add Category')
@endif

@push('content')
<div class="content">
    <div class="row">
      <div class="col-md-12">
        <div class="card-box">
            <div class="row form-horizontal">
              <form class="form-horizontal" id="category-form" role="form" method="POST" action="{{ route('admin.save.category') }}" enctype="multipart/form-data">
                @csrf
                <!-- To get a category id of categories table for update-->
                <input type="hidden" name="category_id" value="{{ old('id',isset($category->id) ? $category->id : '') }} ">
                <input type="hidden" name="parent_id" value="{!!$parentId ?? 0!!}">

                <!-- Get the old Image when update the Categoty-->
                <input type="hidden" name="old_image" value="{{ old('category_image',isset($category->category_image) ? $category->category_image : '') }} ">

                <div class="form-group">
                    <div class="col-sm-6">
                      <labe>Name :- </label>
                          <input type="text" name="category_name" class="form-control" value="{{ old('category_name',isset($category->category_name) ? $category->category_name : '') }}" />
                    </div>
                </div>

                <div class="form-group clearfix">
                  <div class="col-lg-10">
                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                      <a href="{{ route('admin.categories',['id' => $parentId ?? '0']) }}"><button type="button" class="btn btn-warning">Cancel</button></a>
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
    $("#category-form").validate({
        rules: {
            category_name         : 'required',
          },
          messages: {
            category_name         : 'This field is required.',
          
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
