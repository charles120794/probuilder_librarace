@extends('layouts.layout')

@section('title', 'Create Company')

@section('content')

<section class="content-header">
	<h1>&nbsp;</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><i class="fa fa-cogs fa-fw"></i> Settings </li>
		<li><i class="fa fa-folder-o fa-fw"></i> Maintenance </li>
		<li class="active"> <i class="fa fa-user-plus fa-fw"></i> Create Company </li>
	</ol>
</section>

<div class="content">

	@include('errors.alerts')

	<div class="box box-primary">
		
		<div class="box-body" id="users_box" style="min-height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-heading clearfix" style="background-color: white;">
					<h3 class="panel-title pull-left">
						<label><i class="fa fa-plus"></i> CREATE USERS COMPANY </label>
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-create-users-company' , 'id' => Crypt::encrypt('') ]) }}" enctype="multipart/form-data"> {{ csrf_field() }}
						<div class="row">
							<div class="col-md-10 col-md-offset-1" style="overflow-x: auto;">
								<table class="table table-bordered">
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY LOGO: 
										</td>
										<td style="padding: 0px;">
											<input type="file" name="company_logo" class="form-control input-sm">
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY COVER PHOTO: 
										</td>
										<td style="padding: 0px;">
											<input type="file" name="company_cover_photo" class="form-control input-sm">
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY CODE: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_code" maxlength="15" value="{{ old('company_code') }}" autocomplete="off" style="text-transform: uppercase;" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY DESCRIPTION:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_description" value="{{ old('company_description') }}" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY EMAIL: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_email" value="{{ old('company_email') }}" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY NAME: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_name" value="{{ old('company_name') }}" maxlength="50" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY TAGLINE:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_tagline" maxlength="50" value="{{ old('company_tagline') }}" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY LOCATION: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_location" value="{{ old('company_location') }}" maxlength="15" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPLETE ADDRESS:
										</td>
										<td style="padding: 0px;" colspan="3">
											<textarea type="text" class="form-control input-sm" name="company_address" maxlength="50" value="{{ old('company_address') }}" style="text-transform: uppercase;" autocomplete="off" required></textarea>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											PHONE CONTACT NO.: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_contact_phone" value="{{ old('company_contact_phone') }}" maxlength="20" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											MOBILE CONTACT NO.: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_contact_number" value="{{ old('company_contact_number') }}" maxlength="20" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											REGISTERED OWNER: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_registered_owner" value="{{ old('company_registered_owner') }}" maxlength="20" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY FOUNDATION: 
										</td>
										<td style="padding: 0px;">
											<input type="date" class="form-control input-sm" name="company_foundation" value="{{ old('company_foundation') }}" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											LICENSE NUMBER: 
										</td>
										<td style="padding: 0px;">
											<input type="password" class="form-control input-sm" name="company_license_no" value="{{ old('company_license_no') }}" maxlength="20" style="text-transform: uppercase;" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY MAX. USER: 
										</td>
										<td style="padding: 0px;">
											<input type="number" class="form-control input-sm" name="company_system_users" value="{{ old('company_system_users') }}" maxlength="20" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY FACEBOOK: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_facebook" value="{{ old('company_facebook') }}" maxlength="20" placeholder="-- https://www.example-link.com --" autocomplete="off">
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY TWITTER: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_twitter" value="{{ old('company_twitter') }}" maxlength="20" placeholder="-- https://www.example-link.com --" autocomplete="off">
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY PINTEREST: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_pinterest" value="{{ old('company_pinterest') }}" maxlength="20" placeholder="-- https://www.example-link.com --" autocomplete="off">
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY INSTAGRAM: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="company_instagram" value="{{ old('company_instagram') }}" maxlength="20" placeholder="-- https://www.example-link.com --" autocomplete="off">
										</td>
									</tr>
									<tr>
										<td colspan="5">
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