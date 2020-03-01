@extends('layouts.layout')

@section('title', 'Create Module')

@section('content')

<section class="content-header">
	<h1>&nbsp;</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><i class="fa fa-cogs fa-fw"></i> Settings </li>
		<li><i class="fa fa-folder-o fa-fw"></i> Maintenance </li>
		<li class="active"> <i class="fa fa-user-plus fa-fw"></i> Create Module </li>
	</ol>
</section>

<div class="content">

	@include('errors.alerts')

	<div class="box box-primary">
		
		<div class="box-body" id="users_box" style="min-height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-heading clearfix" style="background-color: white;">
					<h3 class="panel-title pull-left">
						<label><i class="fa fa-plus"></i> CREATE SYSTEM MODULE </label>
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-create-system-module' , 'id' => Crypt::encrypt('') ]) }}"> {{ csrf_field() }}
						<div class="row">
							<div class="col-md-8 col-md-offset-2" style="overflow-x: auto;">
								<table class="table table-bordered">
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px; width: 25%;">
											MODULE CODE: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="module_code" maxlength="15" value="{{ old('module_code') }}" style="text-transform: lowercase;" placeholder="15" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											MODULE NAME:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="module_name" maxlength="15" value="{{ old('module_name') }}" style="text-transform: uppercase;" autocomplete="off" placeholder="15" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											MODULE DESCRIPTION:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="module_description" maxlength="50" value="{{ old('module_description') }}" placeholder="50" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											MODULE PATH/URL:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="module_route" maxlength="50" value="{{ old('module_route') }}" placeholder="50" style="text-transform: lowercase;" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											MODULE ICON: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="module_icon" value="{{ old('module_icon') }}" style="text-transform: lowercase;" maxlength="15" placeholder="15" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											MODULE CLASS: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="module_class" value="{{ old('module_class') }}" style="text-transform: lowercase;" maxlength="20" placeholder="20" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td colspan="5" style="padding-right: 0px;">
											<button type="submit" class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> SUBMIT </button>
										</td>
									</tr>
								</table>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

@push('scripts')
<script type="text/javascript">

    function selectModule(event, option = '') {
        $.ajax({
            url : '{{ route('settings.route',['path' => 'side-menu-setup', 'action' => 'settings-retrieve-active-windows', 'id' => Crypt::encrypt('')]) }}',
            method : "post",
            data : { 'module' : event.value },
            processData : true,
            dataType : 'json',
            cache : false,
            success : function(data) {
                option += '<option value="0"> MAIN CLASS </option>';
                $.each( data, function(key,value) {
                    option += '<option value="' + value.menu_id + '">' + value.menu_name + '</option>';
                });
                $('#menu_parent').html(option);
            }
        });
    }

    function submitFormAddModule(form){
        $.ajax({
            url: $('#' + form).attr('action'),
            method:"POST",
            data: new FormData($('#' + form)[0]),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {

                var alert = document.createElement("DIV");
                alert.setAttribute("class", "alert alert-info");
                alert.innerHTML = "<button type='button' class='close alert-close' data-dismiss='alert' area-hidden='true'>&times;</button>";
                alert.innerHTML += "<label><i class='fa fa-warning'></i> " + data + "</label>";
                $('#modaladdmodule #modal_add_module_alert').html(alert);

                $('#' + form)[0].reset();

            }
        });
    }
</script>
@endpush 
@endsection