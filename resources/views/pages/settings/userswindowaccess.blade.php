@extends('layouts.layout')

@section('title', 'Users Window Access')

@section('content')

<section class="content-header">
	<h1> &nbsp; </h1>
	<ol class="breadcrumb">
		<li><a href="/settings/home"><i class="fa fa-dashboard"></i> Dashboard </a></li>
		<li><a href="" onclick="return false;"><i class="fa fa-cogs fa-fw"></i> Settings </a> </li>
		<li class="active"><i class="fa fa-dashboard fa-fw"></i> Users Window Access </li>
	</ol>
</section>

<div class="content">

	<div class="box box-primary">
		<div class="box-body" id="users_box" style="min-height: 75vh;">
			<div class="panel panel-default">
				<div class="panel-heading clearfix" style="background-color: white;">
					<h3 class="panel-title pull-left">
						<label><i class="fa fa-desktop"></i> USERS WINDOW ACCESS </label>
					</h3>
					<div class="text-right">
						<button type="button" class="btn btn-warning btn-sm" onclick="submitFormSearch()"><i class="fa fa-search"></i> SEARCH </button>
						<button type="button" class="btn btn-success btn-sm" onclick="selectAllCheckbox(this)"><i class="fa fa-square"></i> SELECT </button>
						<button type="button" class="btn btn-primary btn-sm" onclick="updateUsersWindowAccess()"><i class="fa fa-save"></i> UPDATE </button>
					</div>
				</div>
				<div class="panel-body">
					<form method="post" id="form_search_users_window"> {{ csrf_field() }}
						<table class="table table-bordered">
							<tr style="white-space: nowrap;">
								<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px; width: 20%;">
									SELECT COMPANY: 
								</td>
								<td style="padding: 0px;" colspan="3">
									<select class="form-control input-sm" id="company_id" name="company_id" onchange="return selectedCompany(this)" required>
							            <option value="" selected> SELECT COMPANY </option>
							            @foreach( $webdata->usersCompany() as $key => $value)
							            <option value="{{ $value->company_id }}"> {{ strtoupper($value->company_code) }} - {{ strtoupper($value->company_name) }} {{ ($value->company_id == $webdata->thisUserDefaultCompany()->company_id) ? ' (DEFAULT COMPANY)' : ''}}</option>
							            @endforeach
							        </select>
								</td>
							</tr>
							<tr style="white-space: nowrap;">
								<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
									SELECT USER: 
								</td>
								<td style="padding: 0px;" colspan="3">
									<select class="form-control input-sm" id="users_id" name="users_id" style="text-transform: uppercase;" onchange="return selectedUser(this)" required disabled>
							            <option value="" selected> SELECT USER </option>
							        </select>
								</td>
							</tr>
							<tr style="white-space: nowrap;">
								<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
									ACCESS WINDOW TO: 
								</td>
								<td style="padding: 0px;" colspan="3">
									<select class="form-control input-sm" id="module_to" name="module_to" onchange="submitFormSearch()" required disabled>
							            <option value="" selected> SELECT MODULE </option>
							        </select>
								</td>
							</tr>
							<tr style="white-space: nowrap;">
								<td style="font-weight: bold; font-size: 12px; vertical-align: middle; padding: 6px;">
									ACCESS WINDOW FROM:
								</td>
								<td style="padding: 0px;" colspan="3">
									<select class="form-control input-sm" id="module_from" name="module_from" onchange="submitFormSearch()" disabled>
							            <option value=""> SELECT MODULE </option>
							        </select>
								</td>
							</tr>
						</table>
	              	</form>
				</div>
			</div>
			<div class="panel panel-default">
				<form method="post" id="form_open_users_window_access"> {{ csrf_field() }}
					<div class="panel-body" id="panel_body" style="min-height: 56vh; overflow: auto;"></div>
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

	$(document).ready(function(){
		$('form').on('submit',function(e){
			e.preventDefault();
		});
		$('input,select,textarea').on('change',function(e){
			if($.trim($(this).val()) != "") {
	    		$(this).css('border-color','');
	    	}
	    });
	});

	function selectAllCheckbox(event) {
		if($(event).attr('checked')) {
			$('.method-checkbox').prop('checked',false);
			$(event).removeAttr('checked');
			$(event).html('<i class="fa fa-square"></i> SELECT');
		} else {
			$('.method-checkbox').prop('checked',true);
			$(event).attr('checked',true);
			$(event).html('<i class="fa fa-check-square"></i> SELECT');
		}
	}

	function selectedCompany(event, option = '') {
        $.ajax({
            url : '{{ route('settings.route',['path' => $path, 'action' => 'settings-retrieve-company-users', 'id' => Crypt::encrypt('')]) }}',
            method : "post",
            data : { 'company' : event.value },
            processData : true,
            dataType : 'json',
            cache : false,
            success : function(data) {
                option += '<option value=""> SELECT USER </option>';
                if(data.length > 0 ){
                	$.each( data, function(key,value) {
	                    option += '<option value="' + value.encrypted_id + '">' + value.firstname + ' '+ value.lastname + '</option>';
	                });
	                $('#users_id').attr('disabled',false);
               		$('#users_id').html(option);
                } else {
	                $('#users_id').attr('disabled',true);
               		$('#users_id').html(option);
                }
            }
        });
	}	

    function selectedUser(event, option = '') {
        $.ajax({
            url : '{{ route('settings.route',['path' => $path, 'action' => 'settings-retrieve-users-module', 'id' => Crypt::encrypt('')]) }}',
            method : "post",
            data : { 'users_id' : event.value },
            processData : true,
            dataType : 'json',
            cache : false,
            success : function(data) {
                option += '<option value=""> SELECT MODULE </option>';
                if(data.length > 0 ){

                	$.each( data, function(key,value) {
	                    option += '<option value="' + value.module_id + '">' + value.module_description + '</option>';
	                });

	                $('#module_to').attr('disabled',false);
               		$('#module_to').html(option);

	                $('#module_from').attr('disabled',false);
               		$('#module_from').html(option);

                } else {
	                $('#module_id').attr('disabled',true);
               		$('#module_id').html(option);
                }
            }
        });
    }

    function submitFormSearch(countRequired = 0) {
    
    	$('#form_search_users_window input,select,textarea').each(function(index,value){
    		if($(this).prop('required') && $(this).val() == ""){
    			countRequired += + 1;
    			$(this).css('border-color','red');
    		}
    	});

    	if(countRequired == 0) {
    		$('.box-overlay-loader').show();
    		$.ajax({
    		    url : '{{ route('settings.route',['path' => $path, 'action' => 'settings-search-users-window', 'id' => Crypt::encrypt('')]) }}',
    		    method : "post",
    		    data: new FormData($('#form_search_users_window')[0]),
    		    contentType: false,
    		    cache: false,
    		    processData: false,
    		    success : function(data) {
    		    	$('#panel_body').html(data);
    		    	$('.box-overlay-loader').hide();
    		    }
    		});
    	} else {
    		alert('Fields is required.');
    	}
    }

    function updateUsersWindowAccess(event, option = '') {
    	$('.box-overlay-loader').show();
        $.ajax({
            url : '{{ route('settings.route',['path' => $path, 'action' => 'settings-update-users-window-access', 'id' => Crypt::encrypt('')]) }}',
            method : "post",
            data: new FormData($('#form_open_users_window_access')[0]),
            contentType: false,
            cache: false,
            processData: false,
            success : function(data) {
            	alert('Successfully Updated.');
            	$('.box-overlay-loader').hide();
            	submitFormSearch();
            }
        });
    }

</script>

@endpush

@endsection


