@extends('home_layouts.home_layout_app')

@push('url_title')
Show User
@endpush


@section('title', 'Show User')


@push('content')





<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row form-horizontal">

                    {{-- <div class="col-md-12 margin-tb mb-4">
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('admin.user') }}"> Back</a>
                        </div>
                    </div> --}}

                    {{-- <form class="form-horizontal" id="user-form" role="form" method="POST"  action="" >
                        @csrf --}}

                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Name:</strong>
                                {{ isset($user->name)&&!empty($user->name)?$user->name:NULL; }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Email:</strong>
                                {{ isset($user->email)&&!empty($user->email)?$user->email:NULL;  }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Department:</strong>
                                {{ isset($user->department)&&!empty($user->department)?$user->department:NULL;  }}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Role:</strong>
                                @if(!empty($user->getRoleNames()))
                                    @foreach($user->getRoleNames() as $v)
                                        <label class="badge badge-warning text-dark">{{ isset($v)&&!empty($v)?$v:array();  }}</label>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    {{-- </form> --}}
                </div>
            </div>
        </div>
    </div>
</div>


@endpush