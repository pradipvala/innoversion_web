

@extends('admin.layouts.app')


@push('url_title')
Create New City
@endpush


@section('title', 'Add New City')


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
                    <form class="form-horizontal" id="user-form" role="form" method="POST"  action="{{ route('admin.city.insert') }}" >
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="name">City Name</label>
                                <input type="text" name="c_name" id="c_name" class="form-control" placeholder="Enter City Name" required>
                            </div>
                        
                            <div class="col-sm-3">
                                 <label for="state">Select state</label>
                                    <select  class="form-control select2" id="state" name="state" required>
                                        <option value="">Please state</option>
                                        @foreach($state as $state1)
                                            <option value="{{$state1->id}}">{{$state1->state}}</option>
                                            
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.city') }}" class="btn btn-primary">Back</a>
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

    



   

