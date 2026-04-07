@extends('admin.layouts.app')

@push('url_title') About Us Details @if (isset($about_us_detail))
    Edit
@else
    Add
@endif @endpush
@if (isset($about_us_detail))
    @section('title', 'Edit About Us Detail')
@else
    @section('title', 'Add About Us Detail')
@endif

<?php //dd($about_us_detail->id); ?>
@push('content')
    <div class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="about_us_detail" role="form" method="POST"
                            action="{{ route('admin.about_us_detail.update',['about_us_detail'=>$about_us_detail->id]) }}" enctype="multipart/form-data">
                            @csrf
                            <!-- To get a category id of categories table for update-->
                            <input type="hidden" name="about_us_detail_id"
                                value="{{ old('id', isset($about_us_detail->id) ? $about_us_detail->id : '') }} ">

                            <!-- Get the old Image when update the Slider-->
                            <input type="hidden" name="old_about_us_ceo_image"
                                value="{{ old('about_us_ceo_image', isset($about_us_detail->about_us_ceo_image) ? $about_us_detail->about_us_ceo_image : '') }} ">
                                
                            <input type="hidden" name="old_mission_image"
                                value="{{ old('mission_image', isset($about_us_detail->mission_image) ? $about_us_detail->mission_image : '') }} ">
                                
                            <input type="hidden" name="old_vision_image"
                                value="{{ old('vision_image', isset($about_us_detail->vision_image) ? $about_us_detail->vision_image : '') }} ">

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>About us Title :- </label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ old('title', isset($about_us_detail->title) ? $about_us_detail->title : '') }}" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>About us Short Description :- </label>
                                    <textarea id="short_description" name="short_description" class="form-control" rows="2" cols="10" />{{ old('short_description', isset($about_us_detail->short_description) ? $about_us_detail->short_description : '') }}
                                    </textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Description :- </label>
                                    <textarea id="description" name="description" class="form-control" rows="2" cols="10" />{{ old('description', isset($about_us_detail->description) ? $about_us_detail->description : '') }}
                                    </textarea>
                                </div>
                            </div>

                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select CEO's Image :- (414 * 532px)</label><br />
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <span style="color:red">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                            
                                        @if (isset($about_us_detail->about_us_ceo_image))

                                            <img src="{{ \Storage::url($about_us_detail->about_us_ceo_image) }}" height="80px"
                                                width="80px"><br /><br />
                                            <input type="file" class="filestyle" name="about_us_ceo_image" id="about_us_ceo_image"
                                                accept="image/jpg, image/png, image/gif, image/jpeg" />
                                        @else
                                                
                                            <input type="file" class="filestyle" name="about_us_ceo_image" id="about_us_ceo_image"
                                                    accept="image/jpg, image/png, image/gif, image/jpeg"
                                                    required />
                                                
                                        @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>CEO Description :- </label>
                                    <textarea id="about_us_ceo_info" name="about_us_ceo_info" class="form-control" rows="2" cols="10" />{{ old('about_us_ceo_info', isset($about_us_detail->about_us_ceo_info) ? $about_us_detail->about_us_ceo_info : '') }}
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>CEO Name :- </label>
                                    <input type="text" name="ceo_name" class="form-control" value="{{ old('ceo_name', isset($about_us_detail->ceo_name) ?$about_us_detail->ceo_name : '') }}"/>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>CEO Designation :- </label>
                                    <input type="text" name="ceo_desg" class="form-control" value="{{ old('ceo_desg', isset($about_us_detail->ceo_desg) ?$about_us_detail->ceo_desg : '') }}"/>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Mission title :- </label>
                                    <input type="text" name="mission_title" class="form-control"
                                        value="{{ old('title', isset($about_us_detail->mission_title) ?$about_us_detail->mission_title : '') }}" />
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Mission Description :- </label>
                                    <textarea id="mission_description" name="mission_description" class="form-control" rows="2" cols="10" />{{ old('mission_description', isset($about_us_detail->mission_description) ? $about_us_detail->mission_description : '') }}
                                    </textarea>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select Mission Image :- (566 * 384px)</label><br />
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <span style="color:red">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                            
                                        @if (isset($about_us_detail->mission_image))

                                            <img src="{{ \Storage::url($about_us_detail->mission_image) }}" height="80px"
                                                width="80px"><br /><br />
                                            <input type="file" class="filestyle" name="mission_image" id="mission_image"
                                                accept="image/jpg, image/png, image/gif, image/jpeg" />
                                        @else
                                                
                                            <input type="file" class="filestyle" name="mission_image" id="mission_image"
                                                    accept="image/jpg, image/png, image/gif, image/jpeg"
                                                    required />
                                                
                                        @endif
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Vision title :- </label>
                                    <input type="text" name="vision_title" class="form-control"
                                        value="{{ old('title', isset($about_us_detail->vision_title) ?$about_us_detail->vision_title : '') }}" />
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Vision Description :- </label>
                                    <textarea id="vision_description" name="vision_description" class="form-control" rows="2" cols="10" />{{ old('vision_description', isset($about_us_detail->vision_description) ? $about_us_detail->vision_description : '') }}
                                    </textarea>
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select Vision Image :- (566 * 384px)</label><br />
                                    @if (count($errors) > 0)
                                        @foreach ($errors->all() as $error)
                                            <span style="color:red">{{ $error }}</span>
                                        @endforeach
                                    @endif
                                            
                                        @if (isset($about_us_detail->vision_image))

                                            <img src="{{ \Storage::url($about_us_detail->vision_image) }}" height="80px"
                                                width="80px"><br /><br />
                                            <input type="file" class="filestyle" name="vision_image" id="vision_image"
                                                accept="image/jpg, image/png, image/gif, image/jpeg" />
                                        @else
                                                
                                            <input type="file" class="filestyle" name="vision_image" id="vision_image"
                                                    accept="image/jpg, image/png, image/gif, image/jpeg"
                                                    required />
                                                
                                        @endif
                                </div>
                            </div>
                            
                           <div class="form-group clearfix">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                    <a href="{{ route('admin.about_us_detail') }}"><button type="button"
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
            
                // function initCKEditor(selector) {
                //     ClassicEditor
                //         .create(document.querySelector(selector))
                //         .catch(error => {
                //             console.error(error);
                //         });
                // }

                // initCKEditor('#description');
                // initCKEditor('#short_description');
                // initCKEditor('#about_us_ceo_info');
                // initCKEditor('#mission_description');
                // initCKEditor('#vision_description');
                
                
                $(document).ready(function() {

                    //Form submit
                    $("#about_us_detail").validate({
                        rules: {
                            title: 'required',
                            slider_image: 'required|mimes:jpg,jpeg,png,mp4,mov,ogg | max:20000',
                            description: 'required',
                        },
                        messages: {
                            title: 'This field is required.',
                            slider_image: 'Only PNG , JPEG , JPG, GIF, Video File Allowed',
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
