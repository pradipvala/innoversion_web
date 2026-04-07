@extends('admin.layouts.app')

@push('url_title') product @if (isset($product))
    Edit
@else
    Add
@endif @endpush
@if (isset($product))
    @section('title', 'Edit product')
@else
    @section('title', 'Add product')
@endif

<style type="text/css">
    .img_column {
        float: left;
        width: 22.22%;
        padding: 5px;
    }
</style>

@push('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="product-form" role="form" method="POST"
                            action="{{ route('admin.save.product.b2c') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- To get a category id of categories table for update-->
                            <input type="hidden" name="product_id"
                                value="{{ old('id', isset($product->id) ? $product->id : '') }} ">

                            <!-- Get the old Image when update the Slider-->
                            @if (isset($product->product_image1))
                                @foreach ($product->product_image1 as $key => $image)
                                    <input type="hidden" name="old_image"
                                        value="{{ old('image', isset($image->image) ? $image->image : '') }} ">
                                @endforeach
                            @endif


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <select name="category_id" id="categories" class="form-control select2"
                                        placeholder="Select a Category" required />
                                    <option></option>
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $category->id }}"
                                            @if (isset($product)) @if ($product->category_id == $category->id) selected @endif
                                            @endif >{{ $category->category_name }}</option>
                                    @endforeach
                                    </select>
                                </div>

                                <div class="col-sm-6">
                                    <select name="subcategory_id" id="subcategories" class="form-control select2"
                                        placeholder="Select a SubCategory">
                                        <option></option>
                                        @foreach ($subCategories as $key => $subCategory)
                                            <option value="{{ $subCategory->id }}"
                                                @if (isset($product)) @if ($product->subcategory_id == $subCategory->id) selected @endif
                                                @endif >{{ $subCategory->category_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Product Title :- </label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', isset($product->title) ? $product->title : '') }}" />
                                </div>

                                <br />
                                <div class="col-sm-6">
                                    <select name="brand_id" id="brand" class="form-control select2"
                                        data-placeholder="Select a Brand">
                                        <option></option>
                                        @foreach ($brands as $key => $brand)
                                            <option value="{{ $brand->id }}"
                                                @if (isset($product)) @if ($product->brand_id == $brand->id) selected @endif
                                                @endif >{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-6">

                                    <label for="description" class="form-label">Product Description</label>
                                    <textarea class="form-control" id="description" cols="20" name="description">{!! old('title', isset($product->description) ? $product->description : '') !!}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select Image :- </label><br />
                                    @if (isset($product->product_image1))
                                        <div class="row" style="margin: auto;">
                                            @foreach ($product->product_image1 as $key => $image)
                                                <div class="img_column">
                                                    <img src="{{ \Storage::url($image->image) }}" height="80px"
                                                        width="80px">
                                                    <i id="hide-icon" class="fa fa-trash remove_image"
                                                        data-product-id="{{ $image->id }}"></i>
                                                    @if (count($errors) > 0)
                                                        @foreach ($errors->all() as $error)
                                                            <span style="color:red">{{ $error }}</span>
                                                        @endforeach
                                                    @endif
                                                </div>
                                            @endforeach
                                        </div>
                                        <input type="file" class="filestyle" multiple name="product_image[]"
                                            id="" accept="image/jpg, image/png, image/gif, image/jpeg" />
                                    @else
                                        <input type="file" class="filestyle" multiple name="product_image[]"
                                            id="" accept="image/jpg, image/png, image/gif, image/jpeg" />

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
                                    <a href="{{ route('admin.products.b2c') }}"><button type="button"
                                            class="btn btn-warning">Cancel</button></a>
                                </div>
                            </div>
                        </form>
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

                initCKEditor('#description');
                $(document).ready(function() {

                    //Form submit
                    $("#product-form").validate({
                        rules: {
                            category_id: 'required',
                            title: 'required',
                            description: 'required',
                            product_image: 'required|mimes:jpg,jpeg,png|max:1024',
                        },
                        messages: {
                            category_id: 'This Field is required',
                            title: 'This field is required.',
                            description: 'This field is required.',
                            product_image: 'Only PNG , JPEG , JPG, GIF File Allowed"',
                        },
                        submitHandler: function(form) {
                            if ($(form).valid()) {
                                form.submit();
                            }
                        }
                    });

                    $(".remove_image").click(function(e) {
                        e.preventDefault();
                        var product_id = $(this).data('product-id');
                        var $this = $(this);

                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to Delete this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, delete it!'
                        }).then((result) => {
                            if (result.value) {
                                $.ajax({
                                    type: "POST",
                                    url: "{{ route('admin.delete.product.image') }}",
                                    data: {
                                        "_token": "{{ csrf_token() }}",
                                        product_id: product_id
                                    },
                                    success: function(result) {
                                        if (result == 'true') {
                                            Swal.fire({
                                                position: 'center',
                                                icon: 'success',
                                                title: result['message'],
                                                showConfirmButton: false,
                                                timer: 2000
                                            });
                                            $this.closest('.img_column').remove();
                                        }
                                    }
                                });
                                return true;
                            }
                        })
                    });

                });
            </script>
        @endpush
