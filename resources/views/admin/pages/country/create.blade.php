

@extends('admin.layouts.app')


@push('url_title') Create New Country @endpush





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
                            action="{{ route('admin.country.insert') }}" >
                        @csrf
                        <div class="form-group">
                           <div class="col-sm-3">
                                <label for="name">Country Name</label>
                                <input type="text" name="country_name" id="cname" class="form-control" placeholder="Enter country name">
                                
                            </div>
                            <div class="col-sm-3">
                                <label for="code">Country code</label>
                                <input type="text" name="code" id="code" class="form-control" placeholder="Enter country code">
                                
                            </div>
                        </div>
                        
                        
                        <div class="form-group clearfix">
                            <div class="col-lg-10">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-primary" href="{{ route('admin.country') }}"> Back</a>
                                
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

