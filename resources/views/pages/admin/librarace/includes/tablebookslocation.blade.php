<table id="datatable" class="table table-bordered table-hover" style="font-size: 13px;">
    <thead>
        <tr class="bg-gray-light">
            <th class="text-center"> ID </th>
            <th class="text-center"> CODE </th>
            <th class="text-center"> DESCRIPTION </th>
            <th class="text-center"> BOOK GROUP </th>
            <th class="text-center"> STATUS </th>
            <th class="text-center"> ACTION </th>
        </tr>
    </thead>
    <tbody>
        @foreach(app('LibraraceBooksLocation')->where('parent_flag','0')->get() as $key => $value)
        <tr>
            <td> {{ ($key + 1) }} </td>
            <td> {{ $value->location_code }} </td>
            <td> {{ $value->location_description }} </td>
            <td class="text-right"> {{ $value->categoryInfo->count() }} </td>
            <td class="text-center">
                <i class="{{ ($value->status == 1) ? 'fa fa-toggle-on text-orange' : 'fa fa-toggle-off text-red' }}" id="togglestatus{{ $value->location_id }}" onclick="return updateStatus(this.id,'{{ route('librarace.route',['path' => $path, 'action' => 'librarace-toggle-book-location', 'id'
                => Crypt::encrypt($value->location_id) ]) }}')" style="font-size: 22px; cursor: pointer;"></i>
            </td>
            <td class="text-center">
                <a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-edit-book-location','id' => Crypt::encrypt($value->location_id)]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-title="Edit / Update" data-placement="left"><i class="fa fa-edit"></i></a>
                <a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-delete-book-location','id' => Crypt::encrypt($value->location_id)]) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this row?')" data-toggle="tooltip" data-title="Delete" data-placement="top"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>