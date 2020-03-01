<input type="hidden" name="users_id" value="{{ Crypt::encrypt($users_id) }}">
<table class="table table-bordered table-condensed table-hover" id="users_table">
	<thead>
		<tr style="font-size: 12px; white-space: nowrap;">
			<th class="text-center" style="vertical-align: top; width: 3%">  ID </th>
			<th class="text-center" style="vertical-align: top; width: 20%"> COMPANY CODE </th>
			<th class="text-center" style="vertical-align: top; width: 10%"> COMPANY NAME </th>
			<th class="text-center" style="vertical-align: top; width: 10%"> COMPANY DESCRIPTION </th>
			<th class="text-center" style="vertical-align: top; width: 10%"> CREATED BY </th>
			<th class="text-center" style="vertical-align: top; width: 10%"> CREATED DATE </th>
		</tr>
	</thead>
	<tbody id="users_table_body">
		@foreach($company as $key => $value)
		<tr style="font-size: 12px; white-space: nowrap;">
			<td class="text-center">
				<input type="hidden" name="company[{{ $key }}][users_id]" value="{{ Crypt::encrypt($users_id) }}">
				<input type="hidden" name="company[{{ $key }}][company_id]" value="{{ Crypt::encrypt($value->company_id) }}">
				<input type="checkbox" class="method-checkbox" name="company[{{ $key }}][checkbox]" {{ (in_array($value->company_id, $companyAccess)) ? 'checked' : '' }} style="height: 17px; width: 17px;">
			</td>
			<td style="vertical-align: middle;"> {{ $value->company_code }} </td>
			<td style="vertical-align: middle;"> {{ $value->company_name }} </td>
			<td style="vertical-align: middle;"> {{ $value->company_description }} </td>
			<td style="vertical-align: middle;"> {{ $value->created_by }} </td>
			<td style="vertical-align: middle;"> {{ $value->created_date }} </td>
		</tr>
		@endforeach
	</tbody>
</table>

@push('scripts')

@endpush