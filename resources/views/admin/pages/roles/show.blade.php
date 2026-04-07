

@extends('admin.layouts.app')

@push('url_title')
Show Role
@endpush


@section('title', 'Show Role')


@push('content')

<div class="content">
    <div class="row ">
        <div class="col-md-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-12 margin-tb mb-4">
                        <div class="pull-right">
                            <a class="btn btn-primary" href="{{ route('admin.role') }}"> Back</a>
                        </div>
                    </div>
                </div>

                <div class="row form-horizontal">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <strong>Name:</strong>
                            {{ isset($role->name)&&!empty($role->name)?$role->name:NULL; }}
                        </div>
                    </div>
                    <?php //foreach($rolePermissions as $value) { echo "<pre>";print_r($value); }  ?>
                    <div class="col-sm-12">
                        <div class="form-group">
                            <strong>Permissions:</strong>
                            <div class="row">
                                {{-- @foreach($permissions as $value)
                                    <div class="col-sm-3">
                                        <label class="ui-checkbox ui-checkbox-success mt-2" for="checkbox-{{ $value->id }}">
                                            <input type="checkbox" name="permissions[]" id="checkbox-{{ $value->id }}" value="{{ $value->id }}" 
                                            <?php //$rolePermissions=[]; if(in_array($value->id, $rolePermissions)){ echo 'checked'; } else { echo 'unchecked'; }?> disabled>
                                            <span class="input-span"></span>{{ $value->name }}
                                        </label>
                                    </div>
                                @endforeach --}}

                                @foreach($rolePermissions as $value)
                                    <div class="col-sm-3">
                                        <label class="ui-checkbox ui-checkbox-success mt-2" for="checkbox-{{ $value->id }}">
                                            <input type="checkbox" name="permissions[]" id="checkbox-{{ $value->id }}" value="{{ $value->id }}" checked disabled>
                                            <span class="input-span"></span>{{ $value->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endpush