@extends('layouts.layout')

@section('title', 'Users')

@section('content')

<section class="content-header">
	<h1> &nbsp; </h1>
	<ol class="breadcrumb">
		<li><a href="/dashboard"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><a href="" onclick="return false;"><i class="fa fa-cogs fa-fw"></i> Settings </a> </li>
		<li class="active"> <i class="fa fa-users"></i> Users </li>
	</ol>
</section>

<div class="content">
	
	@include('errors.alerts')

	<div class="box box-primary">
		<div class="box-header">
			<i class="fa fa-users"></i>
			<h3 class="box-title"> Users Table </h3>
		</div>
		<div class="box-body" style="height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-body">
					<form method="get" action="{{ route('settings.route',['path' => $path, 'action' => 'settings-search-users', 'id' => Crypt::encrypt('1')]) }}">
						<div class="input-group">
			                <input type="text" name="search_user" id="" class="form-control" style="border-radius: 0px;" placeholder="Search user's info here." autocomplete="off">
		                    <span class="input-group-btn">
		                      	<button type="submit" class="btn btn-info btn-flat" style="width: 100px; border-radius: 0px;"><i class="fa fa-search"></i></button>
		                    </span>
	              		</div>
	              	</form>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					<table class="table table-bordered table-condensed" id="users_table">
						<thead>
							<tr style="font-size: 12px;">
								<th class="text-center" style="vertical-align: top; width: 03%"> ID </th>
								<th class="text-center" style="vertical-align: top; width: 20%"> FULL NAME </th>
								<th class="text-center" style="vertical-align: top; width: 20%"> EMAIL ADDRESS </th>
								<th class="text-center" style="vertical-align: top; width: 20%"> CONTACT NUMBER </th>
								<th class="text-center" style="vertical-align: top; width: 10%"> STATUS </th>
								<th class="text-center" style="vertical-align: top; width: 10%"> DETAILS </th>
							</tr>
						</thead>
						<tbody id="users_table_body">
							@include('pages.settings.includes.userstable',['users' => $webdata->allUser()])
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<div class="overlay box-overlay-loader" style="display: none;">
          	<i class="fa fa-refresh fa-spin"></i>
        </div>
	</div>
</div>

@endsection

@section('scripts')

<script src="{{ asset('admin/bower_components/select2/dist/js/select2.full.min.js') }}"></script>

<script type="text/javascript">
	$('form').on('submit',function(e,collect = ''){
		$('.box-overlay-loader').show();
		$.ajax({
			url: this.action,
			method:"POST",
			data: new FormData(this),
			contentType: false,
			cache: false,
			processData: false,
			success: function(data) {
				$('#users_table #users_table_body').html(data);
				$('.box-overlay-loader').hide();
			}
		})
		e.preventDefault();
	});

	function updateStatus(id,url){
		if($('#'+id).hasClass('fa-toggle-on')){
			$('#'+id).removeClass('fa-toggle-on')
			.removeClass('text-orange')
			.addClass('fa-toggle-off').addClass('text-red');
			$.get(url,{status:0},function(count){
				alert(count);
			});
		} else if($('#'+id).hasClass('fa-toggle-off')){
			$('#'+id).removeClass('fa-toggle-off')
			.removeClass('text-red')
			.addClass('fa-toggle-on').addClass('text-orange');
			$.get(url,{status:1},function(count){
				alert(count);
			});
		}
	}

	function deleteFrontline(evt,fid)
	{	
		if(confirm('Are you sure you want to delete this row?')){
			$.get('/delete/frontline/'+evt+'/'+fid,function(data){ $('#'+data).parent().parent().fadeOut(1000); });
		}
	}
</script>

@endsection