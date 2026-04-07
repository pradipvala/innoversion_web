

@extends('home_layouts.home_layout_app')

@push('url_title')
    Edit Role
@endpush

@section('title', 'Edit Role')

@push('content')


    {{-- <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('role') }}"> Back</a>
            </div>
        </div>
    </div> --}}


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
                        <form action="{{ route('roles.update', $role->id) }}" method="get" class="form-horizontal" id="role-form" role="form" >
                            @csrf
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Name:</strong></label>
                                    <input type="text" value="{{ $role->name }}" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>

                            <div class="col-xs-12 mb-3">
                                <input type="checkbox" class="checkboxClass mr-1" id="ckbCheckAll" value="" onchange="checkAll(this)"><span></span><b>Select All</b><br>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <strong>Permission:</strong>
                                    <br />
                                    @foreach ($permission as $value)
                                    <div class="col-sm-3">
                                        <label>
                                            <input type="checkbox" @if (in_array($value->id, $rolePermissions)) checked @endif name="permission[]"
                                                value="{{ $value->id }}" class="name">
                                            {{ $value->name }}</label>
                                    </div>
                                    @endforeach
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





