@extends('layouts.layout')

@section('title', 'System Module')

@section('content')

<section class="content-header">
	<h1> &nbsp; </h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><a href="" onclick="return false;"><i class="fa fa-cogs fa-fw"></i> Settings </a> </li>
		<li class="active"> <i class="fa fa-dashboard fa-fw"></i> System Module </li>
	</ol>
</section>

<div class="content">
	<div class="box box-primary">
		<div class="box-body" id="users_box" style="min-height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-heading clearfix" style="background-color: white;">
					<h3 class="panel-title pull-left">
						<label><i class="fa fa-desktop"></i> SYSTEM MODULE TABLE </label>
					</h3>
					<div class="text-right">
						<button type="button" class="btn btn-warning btn-sm" onclick="submitFormSearch()"><i class="fa fa-search"></i> SEARCH </button>
						<button type="button" class="btn btn-primary btn-sm" onclick="updateSystemModule()"><i class="fa fa-save"></i> UPDATE </button>
						<button type="button" class="btn btn-danger btn-sm" onclick="deleteSystemModule()"><i class="fa fa-trash"></i> DELETE </button>
					</div>
				</div>
				<div class="panel-body">
					<form method="post" id="form_search_system_module"> {{ csrf_field() }}
						<table class="table table-condensed table-bordered">
							<tr>
								<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px; width: 20%;">
									SELECT COMPANY
								</td>
								<td class="no-padding">
									<select class="form-control input-sm" name="company_id" onchange="submitFormSearch()">
										<option value="">-- Select Company --</option>
										@foreach( $webdata->usersCompany() as $key => $value)
										<option value="{{ $value->company_id }}"> {{ $value->company_code }} - {{ $value->company_description }} </option>
										@endforeach
									</select>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
			<div class="panel panel-default">
				<form method="post" id="form_update_system_module"> {{ csrf_field() }}
					<div class="panel-body" id="panel_body" style="min-height: 56vh;"></div>
				</form>
			</div>
		</div>
		<div class="overlay box-overlay-loader" style="display: none;">
          	<i class="fa fa-refresh fa-spin"></i>
        </div>
	</div>
</div>

@push('scripts')

<script type="text/javascript">

	function submitFormSearch(event) {
		$.ajax({
		    url : '{{ route('settings.route',['path' => $path, 'action' => 'settings-search-system-module', 'id' => Crypt::encrypt('')]) }}',
		    method : "post",
		    data : new FormData($('#form_search_system_module')[0]),
		    contentType: false,
		    cache: false,
		    processData: false,
		    success: function(data) {
		    	$('#panel_body').html(data);
		    }
		});
	}

	function updateSystemModule(form) {
		$('.box-overlay-loader').show();
		if(confirm('Are you sure you want to update system module?')) {
			$.ajax({
			    url: '{{ route('settings.route',['path' => $path, 'action' => 'settings-update-system-module', 'id' => Crypt::encrypt('')]) }}',
			    method:"POST",	
			    data: new FormData($('#form_update_system_module')[0]),
			    contentType: false,
			    cache: false,
			    processData: false,
			    success: function(data) {
			    	alert('Successfully Updated');
			    	$('#panel_body').html(data);
			    	submitFormSearch();
			    	$('.box-overlay-loader').hide();
			    }
			});
		}
	}

	function deleteSystemModule(form) {
		if(confirm('Are you sure you want to PERMANENTLY delete this row?')) {
			// $.ajax({
			//     url: '{{ route('settings.route',['path' => $path, 'action' => 'settings-delete-system-module', 'id' => Crypt::encrypt('')]) }}',
			//     method:"POST",
			//     data: new FormData($('#form_update_system_module')[0]),
			//     contentType: false,
			//     cache: false,
			//     processData: false,
			//     success: function(data) {
			//     	$('#panel_body').html(data);
			//     }
			// });
		}
	}

</script>

@endpush

@endsection


