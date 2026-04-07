@extends('admin.layouts.app')

@push('url_title') Slider @if (isset($slider))
    Edit
@else
    Add
@endif @endpush
@if (isset($slider))
    @section('title', 'Edit Slider')
@else
    @section('title', 'Add Slider')
@endif

@push('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="slider-form" role="form" method="POST"
                            action="{{ route('admin.save.slider') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- To get a category id of categories table for update-->
                            <input type="hidden" name="slider_id"
                                value="{{ old('id', isset($slider->id) ? $slider->id : '') }} ">

                            <!-- Get the old Image when update the Slider-->
                            <input type="hidden" name="old_image"
                                value="{{ old('image', isset($slider->image) ? $slider->image : '') }} ">

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Slider Title :- </label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', isset($slider->title) ? $slider->title : '') }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Slider Description :- </label>
                                    <input type="text" name="description" class="form-control"
                                        value="{{ old('title', isset($slider->description) ? $slider->description : '') }}" />
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Slider Link :- </label>
                                    <input type="text" name="link" class="form-control"
                                        value="{{ old('title', isset($slider->link) ? $slider->link : '') }}" />
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select Image :-   (1518 * 844px)</label><br />
                                    @if (isset($slider->image))

                                        @if ($slider->type == 'video')

                                            <video loop autoplay src="{{ \Storage::url($slider->image) }}"
                                                class="edit-video-image" height="100px" width="80px" muted>
                                            </video>
                                            <input type="file" class="filestyle" name="slider_image"
                                                accept="video/mp4, video/x-m4v, video/*" />
                                            @if (count($errors) > 0)
                                                @foreach ($errors->all() as $error)
                                                    <span style="color:red">{{ $error }}</span>
                                                @endforeach
                                            @endif
                                        @else
                                            <img src="{{ \Storage::url($slider->image) }}" height="80px"
                                                width="80px"><br /><br />
                                            <input type="file" class="filestyle" name="slider_image" id=""
                                                accept="image/jpg, image/png, image/gif, image/jpeg, video/mp4, video/x-m4v, video/*" />
                                            @if (count($errors) > 0)
                                                @foreach ($errors->all() as $error)
                                                    <span style="color:red">{{ $error }}</span>
                                                @endforeach
                                            @endif
                                        @endif
                                    @else
                                        <input type="file" class="filestyle" name="slider_image" id=""
                                            accept="image/jpg, image/png, image/gif, image/jpeg, video/mp4, video/x-m4v, video/*"
                                            required />
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
                                    <a href="{{ route('admin.sliders') }}"><button type="button"
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
                    $("#slider-form").validate({
                        rules: {
                            // title: 'required',
                            slider_image: 'required|mimes:jpg,jpeg,png,mp4,mov,ogg | max:20000',
                            // description: 'required',
                        },
                        messages: {
                            // title: 'This field is required.',
                            slider_image: 'Only PNG , JPEG , JPG, GIF, Video File Allowed',
                            // description: 'This field is required.'
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
