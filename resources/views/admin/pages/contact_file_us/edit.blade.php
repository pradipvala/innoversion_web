@extends('admin.layouts.app')

@push('url_title')
    File Edit
@endpush

@section('title', 'Edit File')


@push('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="partner-form" role="form" method="POST"
                            action="{{ route('admin.save.contact.file', ['id' => $file->id]) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <!-- To get a category id of categories table for update-->
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('failure'))
    <div class="alert alert-danger">
        {{ session('failure') }}
    </div>
@endif
                            <!-- Get the old Image when update the Slider-->
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label for="brand_image" class="form-label">Contact File</label>
                                    <input type="file" name="file" class="form-control"  />
                                </div>
                            </div>

                            <div class="form-group clearfix">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                    <a href="{{ route('admin.partners') }}"><button type="button"
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
                    $("#partner-form").validate({
                        rules: {
                            partner_image: 'required|mimes:jpg,jpeg,png|max:1024',
                        },
                        messages: {
                            partner_image: 'Only PNG , JPEG , JPG, GIF File Allowed"',
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
