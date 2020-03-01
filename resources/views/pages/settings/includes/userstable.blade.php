@if(count($users) > 0)
	@foreach($users as $key => $value)
	<tr>
		<td class="text-center">{{ $value->id }}</td>
		<td> {{ $value->firstname }} {{ $value->middlename }} {{ $value->lastname }} </td>
		<td> {{ $value->email }} </td>
		<td> {{ $value->contact }} </td>
		<td class="text-center" style="padding-top: 5px; padding-bottom: 0px;"> 
			<i class="{{ ($value->status == 1) ? 'fa fa-toggle-on text-orange' : 'fa fa-toggle-off text-red' }}" id="togglestatus{{ $value->id }}" onclick="return updateStatus(this.id,'{{ route('settings.route',['path' => $path, 'action' => 'settings-toggle-users-profile', 'id' => Crypt::encrypt($value->id)]) }}')" style="font-size: 23px; cursor: pointer;"></i> 
		</td>
		<td class="text-center">
			<a href="{{ route('settings.route',['path' => $path, 'action' => 'settings-view-users-profile', 'id' => Crypt::encrypt($value->id)]) }}" class="btn btn-warning btn-xs"> &nbsp; <i class="fa fa-edit"></i>&nbsp; </a>
		</td>
	</tr>
	@endforeach
@else 
	<tr>
		<td colspan="6"> No result's found. </td>
	</tr>
@endif