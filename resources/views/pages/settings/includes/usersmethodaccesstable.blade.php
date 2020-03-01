<input type="hidden" name="users_id" value="{{ Crypt::encrypt($users_id) }}">
<table class="table table-bordered table-condensed table-hover" id="users_table">
	<thead>
		<tr style="font-size: 12px; white-space: nowrap;">
			<th class="text-center" style="vertical-align: top; width: 3%">  ID </th>
			<th class="text-center" style="vertical-align: top; width: 20%"> ACTION </th>
			<th class="text-center" style="vertical-align: top; width: 20%"> REQUEST </th>
			{{-- <th class="text-center" style="vertical-align: top; width: 10%"> FUNCTION </th> --}}
			<th class="text-center" style="vertical-align: top; width: 10%"> CREATED BY </th>
			<th class="text-center" style="vertical-align: top; width: 10%"> CREATED DATE </th>
		</tr>
	</thead>
	<tbody id="users_table_body">
		@foreach($methods as $key => $value)
		<tr style="font-size: 12px; white-space: nowrap;">
			<td class="text-center">
				<input type="hidden" name="method[{{ $key }}][users_id]" value="{{ Crypt::encrypt($users_id) }}">
				<input type="hidden" name="method[{{ $key }}][method_id]" value="{{ Crypt::encrypt($value->method_id) }}">
				<input type="checkbox" class="method-checkbox" name="method[{{ $key }}][checkbox]" style="height: 17px; width: 17px;" {{ (in_array($value->method_id, $methodAccess)) ? 'checked' : '' }}>
			</td>
			<td style="vertical-align: middle; text-transform: uppercase;">{{ str_replace('-', ' ', $value->method_name) }}</td>
			<td style="vertical-align: middle; text-transform: uppercase;">{{ $value->method_request }}</td>
			{{-- <td style="vertical-align: middle;">{{ $value->method_function }}</td> --}}
			<td style="vertical-align: middle;">{{ $value->created_by }}</td>
			<td style="vertical-align: middle;">{{ $value->created_date }}</td>
		</tr>
		@endforeach
	</tbody>
</table>

@push('scripts')

@endpush