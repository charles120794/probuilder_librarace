<input type="hidden" name="users_id" value="{{ Crypt::encrypt($users_id) }}">
<table class="table table-bordered table-condensed table-hover" id="users_table">
	<thead>
		<tr style="font-size: 12px;">
			<th class="text-center" style="vertical-align: top; width: 03%"> </th>
			<th class="text-center" style="vertical-align: top; width: 03%"> LEVEL </th>
			<th class="text-center" style="vertical-align: top; width: 20%"> MODULE CODE </th>
			<th class="text-center" style="vertical-align: top; width: 20%"> MODULE DESCRIPTION </th>
		</tr>
	</thead>
	<tbody id="users_table_body">
		@foreach( $module as $key => $value )
			<tr style="font-size: 12px; white-space: nowrap;">
				<td class="text-center no-padding" style="vertical-align: middle;">
					<input type="hidden" name="module[{{ $key }}][users_id]" value="{{ Crypt::encrypt($users_id) }}">
					<input type="hidden" name="module[{{ $key }}][module_id]" value="{{ Crypt::encrypt($value->module_id) }}">
					<input type="checkbox" class="method-checkbox" name="module[{{ $key }}][checkbox]" {{ (in_array($value->module_id,$moduleAccess)) ? 'checked' : '' }} style="width: 16px; height: 16px;">
				</td>
				<td class="text-center"> {{ $value->order_level }} </td>
				<td style="text-transform: uppercase; vertical-align: middle;"> {{ $value->module_code }} </td>
				<td style="vertical-align: middle;"> {{ $value->module_description }} </td>
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