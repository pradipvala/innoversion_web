@extends('admin.layouts.app')

@push('url_title')
    Home Page Services
@endpush

@section('title', 'Add Home Page Services')

@push('content')
    <div class="content">
        <div class="row ">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="aboutus-form" role="form" method="POST"
                            action="{{ route('admin.update.homepageservice', ['id' => $homepageservice->id]) }}"
                            enctype="multipart/form-data">
                            @csrf

                            {{-- <input type="hidden" name="aboutus_id" value="{{ $aboutus->id }}"> --}}



                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Title :- </label>
                                    <input type="text" name="title" class="form-control"
                                        value="{{ $homepageservice->title }}" />
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-10">
                                    <label>Description :- </label>
                                    <textarea id="description" name="description" style="width: 59%;" class="form-control">{{ $homepageservice->description }}</textarea>
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select Image :- </label><br />
                                    @if (isset($homepageservice->image))
                                        <img src="{{ \Storage::url($homepageservice->image) }}" height="80px"
                                            width="80px"><br /><br />
                                        <input type="file" class="filestyle" name="image" id=""
                                            accept="image/jpg, image/png, image/gif, image/jpeg" />
                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $error)
                                                <span style="color:red">{{ $error }}</span>
                                            @endforeach
                                        @endif
                                    @else
                                        <input type="file" class="filestyle" name="image" id=""
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
                                    <a href="{{ route('admin.homepageservice') }}"><button type="button"
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

        initCKEditor('#text');
        initCKEditor('#description');
        initCKEditor('#ceo_message');
        initCKEditor('#mission_text');
        initCKEditor('#vision_text');
        $(document).ready(function() {
            $("#addPoint").click(function() {
                var newPointInput = $("#points-container .point-input:first").clone();
                newPointInput.find("input").val(""); // Clear input value
                $("#points-container").append(newPointInput);
            });
            //Form submit
            $("#aboutus-form").validate({
                rules: {
                    title: 'required',
                    image: 'mimes:jpg,jpeg,png|max:1024',
                    description: 'required',
                },
                messages: {
                    title: 'This field is required.',
                    image: 'Only PNG , JPEG , JPG, GIF File Allowed"',
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
