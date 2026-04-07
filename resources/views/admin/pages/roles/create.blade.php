

@extends('admin.layouts.app')

@push('url_title')
Create New Role
@endpush


@section('title', 'Create New Role')


@push('content')

    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row form-horizontal">
                    <form class="form-horizontal" id="role-form" role="form" method="POST"  action="{{ route('admin.roles.store') }}" >
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12 user_row_data">
                            <input type="checkbox" class="checkboxClass mr-1" id="ckbCheckAll" value="" onchange="checkAll(this)"><span></span><b>Select All</b><br>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <strong>Permission:</strong><br/>
                                    @foreach ($permission as $value)
                                        <div class="col-sm-3">
                                        <label>
                                            <input type="checkbox" name="permission[]" value="{{ $value->id }}" class="name">
                                            {{ $value->name }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="form-group clearfix">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
        function checkAll(myCheckBox) {

            let checkboxes = document.querySelectorAll("input[type='checkbox']");

            if (myCheckBox.checked == true) {
                checkboxes.forEach(function(checkbox) {
                checkbox.checked = true;
                });
            } else {
                checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
                });
            }
        }
    </script>
@endpush

    



   

