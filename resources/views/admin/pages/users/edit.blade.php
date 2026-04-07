
@extends('admin.layouts.app')


@push('url_title')
    Edit User
@endpush

@section('title', 'Edit User')

@push('content')


    {{-- <div class="row">
        <div class="col-lg-12 margin-tb mb-4">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('admin.user') }}"> Back</a>
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
                        <form class="form-horizontal" id="aboutus-form" role="form" method="GET" action="{{ route('admin.users.update') }}">
                            @csrf
                            <input type="hidden" name="id" value="{{ base64_encode($user->id) }}">

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Name:</strong></label>
                                    <input type="text" value="{{ $user->name }}" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Email:</strong></label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Password:</strong></label>
                                    <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Confirm Password:</strong></label>
                                    <input type="password" name="confirm-password" value="{{ $user->password }}" class="form-control" placeholder="Confirm Password">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Department:</strong></label>
                                    <input type="text" name="department" value="{{ $user->department }}"  class="form-control" placeholder="Department">
                                </div>
                            </div>
                            <?php  $user_role_name=isset($userRolename[0])&&!empty($userRolename[0])?$userRolename[0]:NULL;?>
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Role:</strong></label>
                                    <select class="form-control multiple" multiple name="roles[]">
                                        @foreach ($roles as $role) 
                                        <?php if($role == $user_role_name){ $sel='selected';  } else  {   $sel=''; }  ?>
                                            <option value="{{ $role }}" {{$sel}} >{{ $role }}</option>
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
