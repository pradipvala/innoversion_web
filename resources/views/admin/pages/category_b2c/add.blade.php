@extends('admin.layouts.app')

@push('url_title')
    Category Add
@endpush

@section('title', 'Add Category')

@push('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="category-form" role="form" method="POST"
                            action="{{ route('admin.save.category.b2c') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- To get a category id of categories table for update-->




                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Name :- </label>
                                    <input type="text" name="category_name" class="form-control" />
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                    <a href="{{ route('admin.categories.b2c') }}"><button type="button"
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
                    $("#category-form").validate({
                        rules: {
                            category_name: 'required',
                        },
                        messages: {
                            category_name: 'This field is required.',

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
