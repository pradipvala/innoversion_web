
@extends('admin.layouts.app')


@push('url_title')
    Edit City
@endpush

@section('title', 'Edit City')

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
                        <form class="form-horizontal" id="aboutus-form" role="form" method="POST" action="{{ route('admin.city.update') }}">
                            @csrf
                             <input type="hidden" name="id" value="{{ $data->id }}">

                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="name">City Name</label>
                                    <input type="text" name="c_name" id="c_name" class="form-control" placeholder="Enter City Name"value="{{$data->c_name}}" required>
                                </div>
                            
                            
                                <div class="col-sm-3">
                                    <label for="name">State Name</label>
                                    <select  class="form-control" id="state" name="state"required>
                                        <option value="">Please state</option>
                                            @foreach($state as $state1)
                                                <option value="{{$state1->id}}" {{ $state1->id == $data->state_id?'selected':'' }}>{{$state1->state}}</option>
                                                
                                            @endforeach
                                    </select>
                                </div>
                            </div>

                            
                            <div class="form-group clearfix">
                                <div class="col-lg-10">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <a class="btn btn-primary" href="{{ route('admin.city') }}"> Back</a>
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
