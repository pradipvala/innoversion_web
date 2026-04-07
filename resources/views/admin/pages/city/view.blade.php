

@extends('admin.layouts.app')

@push('url_title')
Show  City 
@endpush





@push('content')


<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-3">
                            <label for="name">City Name:</label>
                            <input type="text" name="c_name" id="c_name" class="form-control" placeholder="Enter City Name"value="{{$data->c_name}}" disabled>
                        </div>
                    
                        <div class="col-sm-3">
                            <strong>State Name:</strong>
                            <label for="state">Select state</label>
                                <select  class="form-control select2" id="state" name="state" disabled>
                                    <option value="">Please select state</option>
                                    @foreach($state as $state1)
                                        <option value="{{$state1->id}}" {{ $state1->id==$data->state_id?'selected':'' }}>{{$state1->state}}</option>
                                    @endforeach
                                </select> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endpush