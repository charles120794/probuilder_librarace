@include('errors.alerts')

<table class="table table-bordered table-condensed" id="users_table">
	<thead>
		<tr style="font-size: 12px; white-space: nowrap;">
			<th class="text-center" style="vertical-align: top; min-width: 50px;"> ID </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> CODE </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> NAME </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> DESCRIPTION </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> TAGLINE </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> ADDRESS </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> LOCATION </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> EMAIL </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> CONTACT PHONE </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> CONTACT MOBILE </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> TIN NUMBER </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> FOUNDATION </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> REGISTERED OWNER </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> MAX USER </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> LICENSE NO </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> FACEBOOK </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> TWITTER </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> INSTAGRAM </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> PINTEREST </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> ORDER LEVEL </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> STATUS </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> CREATED BY </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> CREATED DATE </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> UPDATED BY </th>
			<th class="text-center" style="vertical-align: top; min-width: 150px;"> UPDATED DATE </th>
		</tr>
	</thead>
	<tbody id="users_table_body">
		@foreach( (new CommonService)->allCompany() as $key => $value)
			<tr>
				<td class="text-center no-padding">
					<input type="text" class="form-control input-sm" value="{{ $value->company_id }}" readonly>
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" value="{{ $value->company_code }}" readonly>
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_name]" value="{{ $value->company_name }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_description]" value="{{ $value->company_description }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_tagline]" value="{{ $value->company_tagline }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_address]" value="{{ $value->company_address }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_location]" value="{{ $value->company_location }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_email]" value="{{ $value->company_email }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_contact_phone]" value="{{ $value->company_contact_phone }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_contact_number]" value="{{ $value->company_contact_number }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_tin_number]" value="{{ $value->company_tin_number }}"> 
				</td>
				<td class="no-padding"> 
					<input type="date" class="form-control input-sm" name="company[{{ $key }}][company_foundation]" value="{{ $value->company_foundation }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_registered_owner]" value="{{ $value->company_registered_owner }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_system_users]" value="{{ $value->company_system_users }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_license_no]" value="{{ $value->company_license_no }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_facebook]" value="{{ $value->company_facebook }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_twitter]" value="{{ $value->company_twitter }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_instagram]" value="{{ $value->company_instagram }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][company_pinterest]" value="{{ $value->company_pinterest }}"> 
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][order_level]" value="{{ $value->order_level }}"> 
				</td>
				<td class="text-center" style="padding-top: 5px; padding-bottom: 0px;"> 
					<i class="{{ ($value->status == 1) ? 'fa fa-toggle-on text-orange' : 'fa fa-toggle-off text-red' }}" id="togglestatus{{ $value->company_id }}" onclick="return updateStatus(this.id,'{{ route('settings.route',['path' => $path, 'action' => 'settings-toggle-users-company', 'id' => Crypt::encrypt($value->company_id)]) }}')" style="font-size: 22px; cursor: pointer;"></i>
				</td>
				<td class="no-padding">
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][created_by]" value="{{ $value->createdBy() }}" disabled> 
				</td>
				<td class="no-padding"> 
					<input type="{{ (is_null($value->created_date)) ? 'text' : 'date' }}" class="form-control input-sm" name="company[{{ $key }}][created_date]" value="{{ $value->created_date }}" disabled>
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="company[{{ $key }}][updated_by]" value="{{ $value->updatedBy() }}" disabled> 
				</td>
				<td class="no-padding"> 
					<input type="{{ (is_null($value->updated_date)) ? 'text' : 'date' }}" class="form-control input-sm" name="company[{{ $key }}][updated_date]" value="{{ $value->updated_date }}" disabled>
				</td>
			</tr>
		@endforeach
	</tbody>
</table>

@push('scripts')

<script type="text/javascript">

	function updateStatus(id,url){
		if($('#'+id).hasClass('fa-toggle-on')){
			$('#'+id).removeClass('fa-toggle-on')
			.removeClass('text-orange')
			.addClass('fa-toggle-off').addClass('text-red');
			$.get(url,{status:0},function(count){
				
			});
		} else if($('#'+id).hasClass('fa-toggle-off')){
			$('#'+id).removeClass('fa-toggle-off')
			.removeClass('text-red')
			.addClass('fa-toggle-on').addClass('text-orange');
			$.get(url,{status:1},function(count){
				
			});
		}
	}
	
</script>

@endpush