<table class="table table-condensed checkbox-check table-hover table-bordered">
	<thead>
		<tr>
			<th class="text-center" style="min-width: 20px"> <i class="fa fa-check-square-o" style="cursor: pointer;"></i> </th>
			<th class="text-center" style="min-width: 40px"> MODULE </th>
			<th class="text-center" style="width: 40px"> LVL. </th>
			<th class="text-center" style="min-width: 200px;"> ICON </th>
			<th class="text-center" style="min-width: 250px"> DESCRIPTION </th>
			<th class="text-center" style="min-width: 250px;"> CLASS/SUB-CLASS </th>
			<th class="text-center" style="min-width: 150px;"> PATH </th>
			<th class="text-center" style="width: 60px;"> DDTYP </th>
			<th class="text-center" style="width: 60px;"> ORDER </th>
		</tr>
	</thead>
	<tbody>
		@foreach($userswindow as $key => $value)
			<tr style="font-size: 12px;">
				<td class="text-center" style="padding-bottom: 0px;">
					<input type="hidden" name="window[{{ $key }}][menu_id]" value="{{ Crypt::encrypt($value->menu_id) }}">
					<input type="checkbox" name="window[{{ $key }}][checkbox]" style="height: 17px; width: 17px; background-color: transparent;">
				</td>
				<td class="no-padding">
					<input type="text" class="form-control input-sm" name="window[{{ $key }}][menu_link]" value="{{ $value->menu_link }}" style="background-color: transparent; text-transform: uppercase;" readonly>
				</td>
				<td class="no-padding">
					<input type="text" class="form-control input-sm" name="window[{{ $key }}][menu_level]" value="{{ $value->menu_level }}" style="width: 40px;text-align: center; padding-left: 2px; padding-right: 2px; background-color: transparent;">
				</td>
				<td class="no-padding">
					<input type="text" class="form-control input-sm" name="window[{{ $key }}][menu_icon]" value="{{ $value->menu_icon }}" style="background-color: transparent;">
				</td>
				<td class="no-padding">
					<input type="text" class="form-control input-sm" name="window[{{ $key }}][menu_name]" value="{{ $value->menu_name }}" style="background-color: transparent;" autocomplete="off">
				</td>
				<td class="no-padding">
					<select class="form-control input-sm" name="window[{{ $key }}][menu_parent]" style="background-color: transparent;">
						<option value="0"> Main Class </option>
						@foreach( app('SystemWindow')->where('menu_id','!=',$value->menu_id)->where('menu_type','1')->get() as $parent )
						<option value="{{ $parent->menu_id }}" @if($parent->menu_id == $value->menu_parent) selected @endif>
							{{ $parent->menu_name }}
						</option>
						@endforeach
					</select>
				</td>
				<td class="no-padding">
					<input type="text" class="form-control input-sm" name="window[{{ $key }}][menu_path]" value="{{ $value->menu_path }}" style="background-color: transparent;">
				</td>
				<td class="text-center" style="padding-bottom: 0px;">
					<input type="checkbox" name="window[{{ $key }}][menu_type]" value="{{ $value->menu_type }}" @if($value->menu_type == '1') checked @endif style="height: 17px; width: 17px;">
				</td>
				<td style="padding: 0px;">
					<input type="text" name="window[{{ $key }}][order_level]" class="form-control input-sm" value="{{ $value->order_level }}" style="width: 60px;text-align: center; padding-left: 2px; padding-right: 2px; background-color: transparent;">
				</td>
			</tr>
		@endforeach
	</tbody>
</table>