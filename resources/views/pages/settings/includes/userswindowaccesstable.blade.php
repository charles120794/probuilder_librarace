<input type="hidden" name="users_id" value="{{ Crypt::encrypt($users_id) }}">
<table class="table table-bordered table-condensed table-hover" id="users_table">
	<thead>
		<tr>
			<th class="text-center" style="min-width: 20px"> <i class="fa fa-check-square-o" style="cursor: pointer;"></i> </th>
			<th class="text-center" style="min-width: 250px"> DESCRIPTION </th>
			<th class="text-center" style="min-width: 150px;"> PATH </th>
		</tr>
	</thead>
	<tbody id="users_table_body">
		@foreach( $window as $key => $value)
		<tr style="font-size: 12px; display: @if($value->menu_path === $path) none @endif">
			<td class="text-center" style="padding-bottom: 0px;">

				<input type="hidden" name="window[{{ $key }}][users_id]" value="{{ Crypt::encrypt($users_id) }}">
				<input type="hidden" name="window[{{ $key }}][menu_id]" value="{{ Crypt::encrypt($value->menu_id) }}">

				<input type="hidden" name="window[{{ $key }}][module_to]" value="{{ Crypt::encrypt($module_to) }}">
				<input type="hidden" name="window[{{ $key }}][module_from]" value="{{ (!is_null($module_from)) ? Crypt::encrypt($module_from) : Crypt::encrypt($value->module_id) }}">
				
				<input type="hidden" name="window[{{ $key }}][menu_parent]" value="{{ Crypt::encrypt($value->menu_parent) }}">
				<input type="hidden" name="window[{{ $key }}][menu_type]" value="{{ Crypt::encrypt($value->menu_type) }}">

				<input type="checkbox" name="window[{{ $key }}][checkbox]" class="method-checkbox" {{ (in_array($value->menu_id, $windowAccess)) ? 'checked' : '' }} style="height: 17px; width: 17px; background-color: transparent;">

			</td>
			<td style="vertical-align: middle;"> <i class="{{ $value->menu_icon }}"></i> {{ $value->menu_name }} </td>
			<td style="vertical-align: middle;"> {{ $value->menu_path }} </td>
		</tr>
		@endforeach
	</tbody>
</table>
