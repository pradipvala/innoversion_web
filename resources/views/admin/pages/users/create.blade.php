

@extends('admin.layouts.app')


@push('url_title')
Create New User
@endpush


@section('title', 'Add New User')


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
                    <form class="form-horizontal" id="user-form" role="form" method="POST"  action="{{ route('admin.users.store') }}" >
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Email:</strong>
                                <input type="email" name="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Password:</strong>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Confirm Password:</strong>
                                <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Department:</strong>
                                <input type="text" name="department" class="form-control" placeholder="Department">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Role:</strong>
                                <select class="form-control multiple" multiple name="role[]"><!--  name="roles[]-->
                                    @foreach ($roles as $role)
                                        <option value="{{ $role }}">{{ $role }}</option>
                                    @endforeach
                                </select>
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
    </script>
@endpush

    



   

