@extends('admin.layouts.app')

@push('url_title')
    Brand Product
    Add
@endpush

@section('title', 'Add Brand Product')


@push('content')
    <div class="content">

        <div class="row">
            <div class="col-md-12">
                <div class="card-box">
                    <div class="row form-horizontal">
                        <form class="form-horizontal" id="brand-form" role="form" method="POST"
                            action="{{ route('admin.brandproduct.store') }}" enctype="multipart/form-data">
                            @csrf

                            <input type="hidden" name="product" value="{{ $id }}">
                            <!-- To get a category id of categories table for update-->
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label>Select Brand</label>
                                    <select name="brand_id[]" id="brand" class="form-control"
                                        data-placeholder="Select a Brand" multiple>
                                        <option></option>
                                        @foreach ($brands as $key => $brand)
                                            <option value="{{ $brand->id }}"
                                                @if (isset($product)) @if ($product->brand_id == $brand->id) selected @endif
                                                @endif >{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <!-- Get the old Image when update the Slider-->
                            @foreach ($brands as $brand)
                                <div class="form-group brand-info" id="brand-info-{{ $brand->id }}"
                                    style="display: none;">
                                    <div class="col-sm-3">
                                        <label for="brand_title_{{ $brand->id }}" class="form-label">Title for
                                            {{ $brand->name }}:</label>
                                        <input type="text" name="brand_title[{{ $brand->id }}]" class="form-control"
                                            value="{{ old('brand_title.' . $brand->id, isset($product) ? $product->getBrandTitle($brand->id) : '') }}" />
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="brand_description_{{ $brand->id }}" class="form-label">Description
                                            for
                                            {{ $brand->name }}:</label>
                                        <textarea class="form-control" id="brand_description_{{ $brand->id }}"
                                            name="brand_description[{{ $brand->id }}]" cols="3">{!! old('brand_description.' . $brand->id, isset($product) ? $product->getBrandDescription($brand->id) : '') !!}</textarea>
                                    </div>

                                    <div class="col-sm-3">
                                        <label for="brand_image_{{ $brand->id }}" class="form-label">Image for
                                            {{ $brand->name }}:</label>
                                        <input type="file" name="brand_image[{{ $brand->id }}]" class="form-control"
                                            accept="image/*" />
                                    </div>
                                </div>
                            @endforeach


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
                    $("#brand").change(function() {
                        var selectedBrands = $(this).val();
                        $(".brand-info").hide(); // Hide all brand info fields
                        $.each(selectedBrands, function(index, brandId) {
                            $("#brand-info-" + brandId).show(); // Show brand info for selected brands
                        });
                    });
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
