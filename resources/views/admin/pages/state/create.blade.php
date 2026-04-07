

@extends('admin.layouts.app')


@push('url_title')
Create New  State
@endpush





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
                    <form class="form-horizontal" id="user-form" role="form" method="POST"  
                            action="{{ route('admin.state.insert') }}" >
                        @csrf

                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="state">State Name</label>
                                <input type="text" name="state" id="state" class="form-control" placeholder="Enter State Name" required>
                            </div>
                        
                            <div class="col-sm-3">
                                <label for="country">Select Country</label>
                                    <select  class="form-control select2" id="country_name" name="country_name" required>
                                        <option value="">Select country</option>
                                        @foreach($country as $country1)
                                            <option value="{{$country1->id}}">{{$country1->country_name}}</option>
                                        @endforeach
                                    </select>
                            </div>
                        </div>
                        
                        <div class="form-group clearfix">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a href="{{ route('admin.state') }}" class="btn btn-primary">Back</a>
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

    



   

