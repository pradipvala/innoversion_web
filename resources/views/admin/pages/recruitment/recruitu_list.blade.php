@extends('admin.layouts.app')
@push('url_title')
    Recruitment
@endpush
@section('title')
    @push('content')
        <div class="row">
            <div class="col-sm-12">
                <div class="card-box table-responsive">
                    <div class="m-t-0 m-b-10 row">
                        <div class="col-sm-4">
                            <h4 class="m-t-0 header-title"><b>CV's List</b></h4>
                            @if (session('Failes'))
                                <div class="alert alert-danger">
                                    {{ session('Failes') }}
                                </div>
                            @endif
                        </div>
                        <br><br>
                    </div>
                    <table id="table_DT" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>First Name</th>
                                <th>Last Name</th>

                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Job</th>
                                <th>CV</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recruitus as $recruitu)
                                <tr>
                                    <td>{{ $recruitu->first_name }}</td>
                                    <td>{{ $recruitu->last_name }}</td>
                                    <td>{{ $recruitu->email }}</td>
                                    <td>{{ $recruitu->phone }}</td>
                                    <td>{{ isset($recruitu->Recruitment->title)&&!empty($recruitu->Recruitment->title)?$recruitu->Recruitment->title:NULL; }}</td>
                                    <td>  <a href="{{ \Storage::url($recruitu->cv) }}"><button type="button" class="btn btn-warning">CV</button></a>
                                          <a title="Delete" href="{{ route('admin.recruitment.delete',['id'=>$recruitu->id] ) }}" class="act-delete">
                                                    <button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        </div>
    @endpush



@endsection
