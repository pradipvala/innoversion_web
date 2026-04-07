@extends('home_layouts.home_layout_app')

@push('url_title')
Create New Permission
@endpush


@section('title', 'Create New Permission')


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
                    <form action="{{ route('permission.store') }}" method="POST" class="form-horizontal" id="permission-form" role="form" >
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Name:</strong>
                                <input type="text" name="name" class="form-control" placeholder="Name">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-6">
                                <strong>Guard Name:</strong>
                                <input type="text" name="guard_name" class="form-control" placeholder="Guard Name">
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

    



   

