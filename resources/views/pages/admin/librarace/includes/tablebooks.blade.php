<table id="datatable" class="table table-bordered table-hover" style="font-size: 13px;">
	<thead>
		<tr class="bg-gray-light">
			<th class="text-center"> ID </th>
			<th class="text-center"> GROUP </th>
			<th class="text-center"> ISBN NO. </th>
			<th class="text-center"> ITEM CODE </th>
			<th class="text-center"> TITLE </th>
			<th class="text-center"> AUTHOR </th>
			<th class="text-center"> DESCRIPTION </th>
			<th class="text-center"> STATUS </th>
			<th class="text-center"> ACTION </th>
		</tr>
	</thead>
	<tbody>
		@foreach(app('LibraraceBooks')->get() as $key => $value)
		<tr>
			<td> {{ ($key + 1) }} </td>
			<td> {{ $value->categoryInfo->category_code }} - {{ $value->categoryInfo->category_description }}</td>
			<td> {{ $value->book_isbn }}</td>
			<td> {{ $value->book_item }}</td>
			<td> {{ $value->book_title }}</td>
			<td> {{ $value->book_author }}</td>
			<td style="max-width: 200px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"> {{ $value->book_description }}</td>
			<td class="text-center">
				<i class="{{ ($value->status == 1) ? 'fa fa-toggle-on text-orange' : 'fa fa-toggle-off text-red' }}" id="togglestatus{{ $value->book_id }}" onclick="return updateStatus(this.id,'{{ route('librarace.route',['path' => $path, 'action' => 'librarace-toggle-book', 'id'
				=> Crypt::encrypt($value->book_id) ]) }}')" style="font-size: 22px; cursor: pointer;"></i>
			</td>
			<td class="text-center">
				<a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-edit-book','id' => Crypt::encrypt($value->book_id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
				<a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-delete-book','id' => Crypt::encrypt($value->book_id)]) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this row?')"><i class="fa fa-trash"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>