<table id="datatable" class="table table-bordered table-hover" style="font-size: 13px;">
    <thead>
        <tr class="bg-gray-light">
            <th class="text-center"> ID </th>
            <th class="text-center"> CODE </th>
            <th class="text-center"> DESCRIPTION </th>
            <th class="text-center"> LOCATION </th>
            <th class="text-center"> QUANTITY </th>
            <th class="text-center"> PENALTY </th>
            <th class="text-center"> STATUS </th>
            <th class="text-center"> ACTION </th>
        </tr>
    </thead>
    <tbody>
        @foreach(app('LibraraceBooksCategory')->where('parent_id','0')->get() as $key => $value)
        <tr>
            <td> {{ ($key + 1) }} </td>
            <td> {{ $value->category_code }} </td>
            <td> {{ $value->category_description }} </td>
            <td> {{ $value->locationInfo->location_code }} - {{ $value->locationInfo->location_description }}</td>
            <td class="text-right"> {{ $value->booksQuantity->count() }} </td>
            <td class="text-right"> {{ number_format($value->category_book_penalty,2) }} </td>
            <td class="text-center">
                <i class="{{ ($value->status == 1) ? 'fa fa-toggle-on text-orange' : 'fa fa-toggle-off text-red' }}" id="togglestatus{{ $value->category_id }}" onclick="return updateStatus(this.id,'{{ route('librarace.route',['path' => $path, 'action' => 'librarace-toggle-book-category', 'id'
                => Crypt::encrypt($value->category_id) ]) }}')" style="font-size: 22px; cursor: pointer;"></i>
            </td>
            <td class="text-center">
                <a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-edit-book-category','id' => Crypt::encrypt($value->category_id)]) }}" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i></a>
                <a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-delete-book-category','id' => Crypt::encrypt($value->category_id)]) }}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to delete this row?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>