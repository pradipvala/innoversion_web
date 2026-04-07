@extends('admin.layouts.app')

@push('url_title')
    Brand Product
    Edit
@endpush

@section('title', 'Edit Brand Product')


@push('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="brand-form" role="form" method="POST"
                            action="{{ route('admin.brandproduct.update', ['brandproduct' => $brandproduct->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- To get a category id of categories table for update-->

                            <!-- Get the old Image when update the Slider-->


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="brand_title" class="form-label">Title</label>
                                    <input type="text" name="brand_title" class="form-control"
                                        value="{{ $brandproduct->title }}" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="brand_description" class="form-label">Description</label>
                                    <textarea class="form-control" id="brand_description" name="brand_description" cols="3">{{ $brandproduct->description }}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="brand_image" class="form-label">Old Image</label>
                                    <img src="{{ \Storage::url($brandproduct->image) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="brand_image" class="form-label">Image</label>
                                    <input type="file" name="brand_image" class="form-control" accept="image/*" />
                                </div>
                            </div>


                            <div class="form-group clearfix">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                    <a href="{{ route('admin.brands') }}"><button type="button"
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
                $(document).ready(function() {

                    //Form submit
                    $("#brand-form").validate({
                        rules: {
                            brand_image: 'required|mimes:jpg,jpeg,png|max:1024',
                        },
                        messages: {
                            brand_image: 'Only PNG , JPEG , JPG, GIF File Allowed"',
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
