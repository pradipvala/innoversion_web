

@extends('admin.layouts.app')

@push('url_title')
Show State
@endpush


@section('title', 'Show State')


@push('content')





<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row form-horizontal">

                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="name">State Name</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="Enter State Name"  value="{{$data->state}}"disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label for="country">Select Country</label>
                            <select  class="form-control" id="cname" name="cname" disabled>
                                <option value="">Select country</option>
                                    @foreach($country as $country1)
                                        <option value="{{$country1->id}}" {{ $country1->id == $data->country_id?'selected':''}}>{{$country1->country_name}}</option>
                                    @endforeach
                            </select> 
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-sm-3">
                            <a class="btn btn-primary" href="{{ route('admin.state') }}"> Back</a>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endpush