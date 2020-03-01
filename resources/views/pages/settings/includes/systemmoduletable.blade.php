<table class="table table-bordered table-condensed table-hover">
	<thead>
		<tr style="font-size: 12px;">
			<th class="text-center" style="vertical-align: top; width: 25%"> MODULE NAME/CODE </th>
			<th class="text-center" style="vertical-align: top; width: 25%"> MODULE DESCRIPTION </th>
			<th class="text-center" style="vertical-align: top; width: 25%"> MODULE ICON (font-awesome & glyphicon) </th>
			<th class="text-center" style="vertical-align: top; width: 25%"> MODULE CLASS </th>
		</tr>
	</thead>
	<tbody>
		@foreach( $module as $key => $value )
			<tr style="font-size: 12px; white-space: nowrap;">
				<td class="no-padding">
					<input type="hidden" name="module[{{ $key }}][module_id]" value="{{ Crypt::encrypt($value->module_id) }}">
					<input type="text" class="form-control input-sm" name="module[{{ $key }}][module_name]" value="{{ $value->module_name }}" required autocomplete="off" maxlength="15">
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="module[{{ $key }}][module_description]" value="{{ $value->module_description }}" required autocomplete="off" maxlength="50">
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="module[{{ $key }}][module_icon]" value="{{ $value->module_icon }}" required autocomplete="off" maxlength="15">
				</td>
				<td class="no-padding"> 
					<input type="text" class="form-control input-sm" name="module[{{ $key }}][module_class]" value="{{ $value->module_class }}" required autocomplete="off" maxlength="10">
				</td>
			</tr>
		@endforeach
	</tbody>
</table>
