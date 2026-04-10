
@extends('admin.layouts.app')

@push('url_title') Service Add @endpush

    @section('title', 'Add Service')

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
                <div class="card-box table-responsive">
                    <div class="row form-vertical">
                        <form class="form-vertical" id="product-form" role="form" method="POST"
                            action="{{ route('admin.services_1.store') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group">
                                <div class="col-sm-6">
                                   <label for="title">Title:</label>
                                     <input type="text" id="title" name="title" class="form-control">
                                </div>
                            </div>


                            <div class="form-group">
                                <div class="col-sm-6">
                                   <label for="sub_title">Sub Title:</label>
                                     <input type="text" id="sub_title" name="sub_title" class="form-control">
                                </div>
                            </div>


                              <div class="form-group">
                                <div class="col-sm-6">
                                   <label for="description">Description:</label>
                                   <textarea id="description" name="description"></textarea>
                                </div>
                            </div>
                                 <div class="form-group">
                                <div class="col-sm-6">
                                    <label>Select Image :- 362 × 241px</label><br />

                                        <input type="file" class="filestyle" multiple name="img"
                                            id="" accept="image/jpg, image/png, image/gif, image/jpeg , image/webp" />

                                        @if (count($errors) > 0)
                                            @foreach ($errors->all() as $error)
                                                <span style="color:red">{{ $error }}</span>
                                            @endforeach
                                        @endif

                                </div>
                            </div>
        </br>

                            <div class="form-group clearfix">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                                    <a href="{{ route('admin.products') }}"><button type="button"
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
                    $('#description').summernote({
                        height: 200
                    });
                });

            </script>
        @endpush
