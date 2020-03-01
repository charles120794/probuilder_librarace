@extends('layouts.layout')

@section('title', 'Users')

@section('content')

<section class="content-header">
	<h1>
		<i class="fa fa-users"></i> Users Profile
		<small> Control panel </small>
	</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><a href="#"><i class="fa fa-cogs"></i> Settings </a></li>
		<li class="active"> <i class="fa fa-users"></i> Users Profile </li>
	</ol>
</section>

<div class="content">

	@include('errors.alerts')

	<div class="row">
	  	<div class="col-md-3">
			<!-- Profile Image -->
			<div class="box box-primary">
				<div class="box-body box-profile">
					<form method="post" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-update-user-profile-photo','id' => Crypt::encrypt($UserDetails->id) ]) }}" enctype="multipart/form-data"> {{ csrf_field() }}
						<img class="profile-user-img img-responsive img-circle" src="{{ asset($UserDetails->profile_path) }}" alt="User profile picture" style="height: 150px; width: 150px;">
						<h3 class="profile-username text-center">
							{{ $UserDetails->firstname }} {{ $UserDetails->middlename }} {{ $UserDetails->lastname }}
						</h3>
						<p class="text-muted text-center">{{ $UserDetails->position_title }}</p>
						<ul class="list-group list-group-unbordered">
							<li class="list-group-item">
								<input type="file" name="change_profile" class="form-control" required="">
							</li>
						</ul>
						<button type="submit" class="btn btn-primary btn-block"><b>Change Profile</b></button>
					</form>
				</div> <!-- /.box-body -->
			</div> <!-- /.box -->
			<!-- About Me Box -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">About Me</h3>
				</div>
				<div class="box-body">
					<strong><i class="fa fa-book margin-r-5"></i> Education </strong>
					<p class="text-muted"> {{ $UserDetails->education }} </p> <hr>
					<strong><i class="fa fa-map-marker margin-r-5"></i> Location </strong>
					<p class="text-muted"> {{ $UserDetails->address }} </p> <hr>
					<strong><i class="fa fa-envelope margin-r-5"></i> Email </strong>
					<p> {{ $UserDetails->email }} </p> <hr>
					<strong><i class="fa fa-phone margin-r-5"></i> Contact </strong>
					<p> {{ $UserDetails->contact }} </p>
				</div>
			</div>
		</div> <!-- /.col-md-3-->
		<div class="col-md-9">
			<div class="nav-tabs-custom">
				<ul class="nav nav-tabs" style="height: 80px;">
					<li style="width: 20%;" class="active">
						<a href="#activity" data-toggle="tab"><i class="fa fa-edit fa-fw"></i> Information </a>
					</li>
					<li style="width: 20%;">
						<a href="#security" data-toggle="tab"><i class="fa fa-lock fa-fw"></i> Security </a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="active tab-pane" id="activity">
						@include('pages.settings.forms.formusersinfo')
					</div>
					<div class="tab-pane" id="security">
						@include('pages.settings.forms.formuserssecurity')
					</div>
				</div> <!-- /.tab-content -->
			</div><!-- /.nav-tabs-custom -->
		</div><!-- /.col -->
	</div> <!-- /.row -->
</div>

@endsection

@section('scripts')
<script type="text/javascript">

	$('#btn_edit').on('click',function(){
		if($(this).is(':checked')){
			$('#btn_save').attr('disabled',false);
			$('.info-text').hide();
			$('.info-input').show().css('border-color','darkgreen');
			$('.info-input')[0].focus();
		}else{
			$('#btn_save').attr('disabled',true);
			$('.info-text').show();
			$('.info-input').hide();
		}
	});

</script>
@endsection