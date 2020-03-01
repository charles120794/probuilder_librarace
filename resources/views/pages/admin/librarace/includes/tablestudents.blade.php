<table id="datatable" class="table table-bordered table-hover" style="font-size: 13px;">
    <thead>
        <tr class="bg-gray-light">
            <th class="text-center"> ID </th>
            <th class="text-center"> ID NUMBER </th>
            <th class="text-center"> EMAIL </th>
            <th class="text-center"> FULL NAME </th>
            <th class="text-center"> CONTACT NO. </th>
            <th class="text-center"> STATUS </th>
            <th class="text-center"> ACTION </th>
        </tr>
    </thead>
    <tbody>
        @foreach(app('LibraraceUsersData')->get() as $key => $value)
        <tr>
            <td> {{ ($key + 1) }} </td>
            <td> {{ $value->user_code }} </td>
            <td> {{ $value->user_email }} </td>
            <td> {{ $value->user_firstname }} {{ $value->user_middlename }} {{ $value->user_lastname }} </td>
            <td> {{ $value->user_contact }} </td>
            <td class="text-center">
                <i class="{{ ($value->status == 1) ? 'fa fa-toggle-on text-orange' : 'fa fa-toggle-off text-red' }}" id="togglestatus{{ $value->user_id }}" onclick="return updateStatus(this.id,'{{ route('librarace.route',['path' => $path, 'action' => 'librarace-toggle-user-data', 'id'
                => Crypt::encrypt($value->user_id) ]) }}')" style="font-size: 22px; cursor: pointer;"></i>
            </td>
            <td class="text-center">
                <a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-show-user-data','id' => Crypt::encrypt($value->user_id)]) }}" class="btn btn-warning btn-xs" data-toggle="tooltip" data-title="Show more..." data-placement="left"><i class="fa fa-eye"></i></a>
                <a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-edit-user-data','id' => Crypt::encrypt($value->user_id)]) }}" class="btn btn-primary btn-xs" data-toggle="tooltip" data-title="Edit / Update" data-placement="top"><i class="fa fa-edit"></i></a>
                <a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-delete-user-data','id' => Crypt::encrypt($value->user_id)]) }}" class="btn btn-danger btn-xs" data-toggle="tooltip" data-title="Delete" data-placement="right" onclick="return confirm('Are you sure you want to delete this row?')"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>