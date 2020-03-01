@extends('layouts.layout')

@section('title', 'Company Settings')

@section('content')

<section class="content-header">
	<h1>&nbsp;</h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><i class="fa fa-cogs fa-fw"></i> Settings </li>
		<li><i class="fa fa-folder-o fa-fw"></i> Activity </li>
		<li class="active"> <i class="fa fa-dashboard fa-fw"></i> Company Settings </li>
	</ol>
</section>

<div class="content">

	@include('errors.alerts')

	<div class="box box-primary">
		<div class="box-header with-border">
			<i class="fa fa-building fa-fw"></i>
			<h3 class="box-title"> <label> USERS COMPANY </label> </h3>
		</div>
		<div class="box-body" style="height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="get" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-search-users-company', 'id' => Crypt::encrypt('1')]) }}" style="margin-bottom: 10px;">
						<div class="input-group">
			                <input type="text" name="search_company" class="form-control" style="border-radius: 0px;" placeholder="Search company here" autocomplete="off">
		                    <span class="input-group-btn">
		                      	<button type="submit" class="btn btn-info btn-flat" style="width: 100px; border-radius: 0px;"><i class="fa fa-search"></i></button>
		                    </span>
	              		</div>
	              	</form>
					<div style="overflow-y: auto;">
						@include('pages.settings.includes.systemcompanytable',['users' => $webdata->allUser()])
					</div>
				</div>
			</div>
		</div>
		<div class="overlay box-overlay-loader" style="display: none;">
          	<i class="fa fa-refresh fa-spin"></i>
        </div>
	</div>
</div>

@endsection