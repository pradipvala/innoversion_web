@php
	$frames = $frames ?? false;
	$view = $view ?? true;
	$edit = $edit ?? true;
	$category_edit = $category_edit ?? false;
	$delete = $delete ?? true;
	$statusshow = $statusshow ?? false;
	$adstatusshow = $adstatusshow ?? false;
	$view_prev_vers = $view_prev_vers ?? false;
	$orders = $orders ?? false;
	$generate_vcard = $generate_vcard ?? false;
	$generate_franchise_code = $generate_franchise_code ?? false;
	$franchise_code = $franchise_code ?? false; 
	$approve = $approve ?? false; 
	$reject = $reject ?? false; 
	$sub_approve = $sub_approve ?? false; 
	$sub_reject = $sub_reject ?? false; 

@endphp

@if($view)
	<a href="{{ route($routeName.'.view', $id) }}" target="_blank" title="View">
		<button type="button" class="btn btn-primary btn-custom waves-effect waves-light"><i class="fa fa-eye"></i></button></a>
@endif

@if($statusshow)
	<label class="switch"><input type="checkbox" {{ $status == '1' ? 'checked' : '' }} value="{{ $id }}" id="status" style="size: small"><span class="slider round"></span></label>
@endif

@if($adstatusshow)
	<label class="switch"><input type="checkbox" {{ $ad_status == '1' ? 'checked' : '' }} value="{{ $id }}" id="ad_status" style="size: small"><span class="slider round"></span></label>
@endif

@if($view_prev_vers)
	<a href="{{ route('previous_version'.'.show',$id) }}" title="Edit"><button type="button" class="btn btn-icon waves-effect waves-light btn-info">Prev Vers</button></a>
@endif

@if($category_edit)
	<a href="{{ route($routeName.'.edit',[$id,$parent_id]) }}" title="Edit"><button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button></a>
@endif

@if($edit)
	<a title="Edit" href="{{ route($routeName.'.edit',$id) }}" title="Edit"><button type="button" class="btn btn-icon waves-effect waves-light btn-warning"><i class="fa fa-edit"></i></button></a>
@endif

@if($delete)
	<a title="Delete" href="{{ route($routeName.'.delete', $id) }}" class="act-delete"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"><i class="fa fa-trash"></i></button></a>
@endif	

@if($frames)
	<a title="Frames" href="{{ route($routeName.'.frames', $id) }}"><button type="button" class="btn btn-icon waves-effect waves-light btn-info">Frames</button></a>
@endif

@if($orders)
	<a title="order" href="{{ route($routeName.'.orders', $id) }}">
		<button type="button" class="btn btn-icon waves-effect waves-light btn-primary">Orders </button></a>
@endif



@if($generate_vcard)
	<a  title="generate_v_link" href="{{ route('admin.generate_vcard', base64_encode($id)) }}" title="generate_vcard">
		<button type="button" class="btn btn-success" >Generate Vcard Link</button>
	</a>
@endif


@if($generate_franchise_code)
<a  title="generate_sub_franchise_code" href="{{ route('admin.generate_sub_franchise_code', $id) }}" title="Generate Sub Franchise Code">
	<button type="button" class="btn btn-success" >Generate Sub Franchise Code</button>
</a>
@endif

@if($franchise_code)
<a  title="generate_franchise_code" href="{{ route('admin.franchise_code', $id) }}" title="Generate Franchise Code">
	<button type="button" class="btn btn-success" >Generate Franchise Code</button>
</a>
@endif

@if($approve)
<a  href="{{ route('admin.franchise_approve', $id) }}" title="Approve Franchise">
	<button type="button" class="btn btn-primary" ><i class="fa fa-check-circle"> Approved</i></button>
</a>
@endif

@if($reject)
<a  href="{{ route('admin.franchise_reject', $id) }}" title="Reject Franchise">
	<button type="button" class="btn btn-danger"><i class="fa fa-times-circle"> Reject</i></button>
</a>
@endif

@if($sub_approve)
<a  href="{{ route('admin.sub_franchise_approve', $id) }}" title="Approve Franchise">
	<button type="button" class="btn btn-primary" ><i class="fa fa-check-circle"> Approved</i></button>
</a>
@endif

@if($sub_reject)
<a  href="{{ route('admin.sub_franchise_reject', $id) }}" title="Reject Franchise">
	<button type="button" class="btn btn-danger"><i class="fa fa-times-circle"> Reject</i></button>
</a>
@endif