@extends('layouts.layout')

@section('title', 'Company Setting')

@section('content')

<section class="content-header">
	<h1>&nbsp;</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><i class="fa fa-cogs fa-fw"></i> Settings </li>
		<li><i class="fa fa-folder-o fa-fw"></i> Maintenance </li>
		<li class="active"> <i class="fa fa-user-plus fa-fw"></i> Create User </li>
	</ol>
</section>

<div class="content">

	@include('errors.alerts')

	<div class="box box-primary">
		<div class="box-body" id="users_box" style="min-height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-heading clearfix" style="background-color: white;">
					<h3 class="panel-title pull-left">
						<label><i class="fa fa-user-plus"></i> CREATE NEW USER </label>
					</h3>
				</div>
				<div class="panel-body">
					<form method="post" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-create-user', 'id' => csrf_token() ]) }}" enctype="multipart/form-data"> {{ csrf_field() }}
						<div class="row">
							<div class="col-md-12" style="overflow-x: auto;">
								<table class="table table-bordered">
									<tr>
										<th class="text-center">
											PROFILE PHOTO
										</th>
										<th class="text-center" colspan="2" style="width: 43%; min-width: 400px;">
											USER INFORMATION
										</th>
										<th class="text-center" colspan="2" style="width: 43%; min-width: 400px;">
											SECURITY
										</th>
									</tr>
									<tr>
										<td rowspan="8" style="width: 200px;">
											<div class="profile-photo" id="profile_photo_div" onclick="$('#profile_photo').click();" style="height: 250px; width: 230px; background-color: #999; cursor: pointer;">
												<img src="" id="load_image" style="height: 100%;width: 100%;">
											</div>
											<input type="file" name="profile_photo" id="profile_photo" style="position: absolute; opacity: 0;" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											COMPANY: 
										</td>
										<td style="padding: 0px;">
											<select class="form-control input-sm" name="company" required>
												<option value="">Select Company</option>
												@foreach( (new CommonService)->usersCompany() as $value)
												<option value="{{ $value->company_id }}" {{ ($value->company_id  == old('company')) ? 'selected' : '' }}> {{ $value->company_code }} {{ $value->company_description }} </option>
												@endforeach
											</select>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											USERNAME: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="username" value="{{ old('username') }}" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											FIRSTNAME:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="firstname" value="{{ old('firstname') }}" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											PASSWORD: 
										</td>
										<td style="padding: 0px;">
											<input type="password" class="form-control input-sm" name="password" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											MIDDLENAME:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="middlename" value="{{ old('middlename') }}" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											CONFIRM PASSWORD: 
										</td>
										<td style="padding: 0px;">
											<input type="password" class="form-control input-sm" name="cpassword" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											LASTNAME:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="lastname" value="{{ old('lastname') }}" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											EMAIL ADDRESS:
										</td>
										<td style="padding: 0px;">
											<input type="email" class="form-control input-sm" name="email" value="{{ old('email') }}" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											 BIRTHDATE: 
										</td>
										<td style="padding: 0px;">
											<input type="date" class="form-control input-sm" name="birth_date" value="{{ old('birth_date') }}" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											CONTACT NUMBER:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="contact_no" value="{{ old('contact_no') }}" autocomplete="off" required>
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											EDUCATION: 
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="education" value="{{ old('education') }}" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											
										</td>
										<td style="padding: 0px;">
											
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											POSITION:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="position_title" value="{{ old('position_title') }}" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											
										</td>
										<td style="padding: 0px;">
											
										</td>
									</tr>
									<tr>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											ADDRESS:
										</td>
										<td style="padding: 0px;">
											<input type="text" class="form-control input-sm" name="address" value="{{ old('address') }}" autocomplete="off" required>
										</td>
										<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
											
										</td>
										<td style="padding: 0px;">
											
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
	$(document).ready(function(){

		$('#profile_photo').on('change',function(){
			displayImage(this);
		});

	     function displayImage(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        reader.onload = function (e) {
		            $('#load_image').attr('src', e.target.result);
		        }
		        reader.readAsDataURL(input.files[0]);
		    }
		}
	
	})
</script>
@endpush 
@endsection