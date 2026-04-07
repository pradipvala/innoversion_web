

@extends('home_layouts.home_layout_app')


@push('url_title')
Edit Permission
@endpush

@section('title', 'Edit Permission')

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
                        <form action="{{ route('permission.update', $data->id) }}" method="get" class="form-horizontal" id="permission-form" role="form" >
                            @csrf
                            
                            <div class="form-group">
                                <div class="col-sm-6">
                                    <label><strong>Name:</strong></label>
                                    <input type="text" value="{{ $data->name }}" name="name" class="form-control" placeholder="Name">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-6">
                                    <strong>Guard Name:</strong>
                                    <input type="text" value="{{ $data->guard_name }}" name="guard_name" class="form-control" placeholder="Guard Name">
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





