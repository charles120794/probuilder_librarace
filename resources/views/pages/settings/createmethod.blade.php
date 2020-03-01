@extends('layouts.layout')

@section('title', 'Create Method')

@section('content')

<section class="content-header">
	<h1>&nbsp;</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><i class="fa fa-cogs fa-fw"></i> Settings </li>
		<li><i class="fa fa-folder-o fa-fw"></i> Maintenance </li>
		<li class="active"> <i class="fa fa-user-plus fa-fw"></i> Create Method </li>
	</ol>
</section>

<div class="content">

	@include('errors.alerts')

	<div class="box box-primary">
		
		<div class="box-body" id="users_box" style="min-height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-heading clearfix" style="background-color: white;">
					<h3 class="panel-title pull-left">
						<label><i class="fa fa-plus"></i> CREATE USERS METHOD </label>
					</h3>
				</div>
				<div class="panel-body">
					<form id="form_addwindow" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-create-window-method' , 'id' => Crypt::encrypt('') ]) }}" method="post"> {{ csrf_field() }} {{ csrf_field() }}
						<div class="row">
							<div class="col-md-8 col-md-offset-2" style="overflow-x: auto;">
								<table class="table table-bordered">
									<tr style="white-space: nowrap;">
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											METHOD NAME: 
										</td>
										<td style="padding: 0px;" colspan="3">
											<input type="text" name="method_name" class="form-control input-sm" maxlength="100" required autofocus="tru" autocomplete="off">
										</td>
									</tr>
									<tr style="white-space: nowrap;">
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											SELECT MODULE: 
										</td>
										<td style="padding: 0px;" colspan="3">

											<?php $moduleAccess = $webdata->getModuleAccess($webdata->thisUser()->id); ?>

											<select class="form-control input-sm" id="module_id" name="module_id" onchange="return selectedModule(this)" required>
									            <option value="" selected> SELECT MODULE </option>
									            @foreach( (new ModuleController)->usersModuleAccess($moduleAccess) as $key => $value)
									            <option value="{{ $value->module_code }}"> {{ strtoupper($value->module_code) }} - {{ $value->module_description }} </option>
									            @endforeach
									        </select>

										</td>
									</tr>
									<tr style="white-space: nowrap;">
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											SELECT CLASS: 
										</td>
										<td style="padding: 0px;">
											<select class="form-control input-sm" id="menu_parent" name="menu_parent" onchange="return selectedClass(this)" disabled required>
									            <option value=""> SELECT CLASS </option>
									        </select>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											SELECT SUB-CLASS: 
										</td>
										<td style="padding: 0px;">
											<select class="form-control input-sm" id="menu_child" name="menu_child" onchange="return selectedSubClass(this)" disabled required>
									            <option value=""> SELECT SUB-CLASS </option>
									        </select>
										</td>
									</tr>
									<tr style="white-space: nowrap;">
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											REQUEST TYPE:
										</td>
										<td style="padding: 0px;">
											<select class="form-control input-sm" name="request_type" id="request_type" style="border-radius: 0px; text-transform: uppercase;" required>
									            <option value="post"> POST </option>
									            <option value="get"> GET </option>
									        </select>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											METHOD ACTION:
										</td>
										<td style="padding: 0px;">
											<select class="form-control input-sm" name="action" id="action" style="border-radius: 0px; text-transform: uppercase;" required>
												<option value="retriv"> DISPLAY </option>
									            <option value="create"> CREATE </option>
									            <option value="update"> UPDATE </option>
									            <option value="delete"> DELETE </option>
									            <option value="toggle"> TOGGLE </option>
									            <option value="custom"> CUSTOMIZE </option>
									            <option value="action"> ACTION </option>
									        </select>
										</td>
									</tr>
									<tr>
										<td colspan="5">
											<button class="btn btn-primary btn-sm pull-right"><i class="fa fa-save"></i> SUBMIT </button>
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

    function selectedModule(event, option = '') {
        $.ajax({
            url : '{{ route('settings.route',['path' => $path, 'action' => 'settings-retrieve-window-classes', 'id' => Crypt::encrypt('')]) }}',
            method : "post",
            data : { 'module' : event.value },
            processData : true,
            dataType : 'json',
            cache : false,
            success : function(data) {
                
                option += '<option value=""> SELECT CLASS </option>';

                if(data.length > 0 ){

                	$.each( data, function(key,value) {
	                    option += '<option value="' + value.menu_id + '">' + value.menu_name + '</option>';
	                });

	                $('#menu_parent').attr('disabled',false);
               		$('#menu_parent').html(option);

	                $('#menu_child').attr('disabled',true);
               		$('#menu_child').html('<option value=""> SELECT SUB-CLASS </option>');

                } else {
             
	                $('#menu_parent').attr('disabled',true);
               		$('#menu_parent').html(option);

                }
               
            }
        });
    }

    function selectedClass(event, option = '') {
        $.ajax({
            url : '{{ route('settings.route',['path' => $path, 'action' => 'settings-retrieve-window-sub-class', 'id' => Crypt::encrypt('')]) }}',
            method : "post",
            data : { 'parent' : event.value },
            processData : true,
            dataType : 'json',
            cache : false,
            success : function(data) {
                
                option += '<option value=""> SELECT SUB-CLASS </option>';

                if(data.length > 0 ){

                	$.each( data, function(key,value) {
	                    option += '<option value="' + value.menu_id + '">' + value.menu_name + '</option>';
	                });

	                $('#menu_child').attr('disabled',false);
               		$('#menu_child').html(option);

                } else {
             
	                $('#menu_child').attr('disabled',true);
               		$('#menu_child').html(option);

                }
               
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