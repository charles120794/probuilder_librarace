<table id="datatable" class="table table-bordered table-hover" style="font-size: 12px;">
	<thead>
		<tr class="bg-gray-light">
			<th class="text-center"> ID </th>
			<th class="text-center"> ID NUMBER </th>
			<th class="text-center"> FULL NAME </th>
			<th class="text-center"> DATE REQUESTED </th>
			<th class="text-center"> APPROVED BY </th>
			<th class="text-center"> <a href="#" data-toggle="tooltip" data-title="Book Request Quantity" data-placement="top"> RE. QTY </a> </th>
			<th class="text-center"> <a href="#" data-toggle="tooltip" data-title="Book Issued Quantity" data-placement="top"> IS. QTY </a> </th>
			<th class="text-center"> <a href="#" data-toggle="tooltip" data-title="Book Returned Quantity" data-placement="top"> RT. QTY </a> </th>
			<th class="text-center"> ACTION </th>
		</tr>
	</thead>
	<tbody>
		@foreach(app('LibraraceBorrow')->where('status','A')->orderBy('created_date','desc')->get() as $key => $value)
		<tr>
			<td> {{ ($key + 1) }} </td>
			<td> {{ $value->usersInfo->user_code }}</td>
			<td> {{ $value->usersInfo->user_firstname }} {{ $value->usersInfo->user_lastname }}</td>
			<td> {{ $value->created_date }}</td>
			<td> {{ $value->approverInfo->firstname }} {{ $value->approverInfo->lastname }}</td>
			<td class="text-center"> {{ $value->booksRequestQty->count() }} </td>
			<td class="text-center"> {{ $value->booksIssuedQty->count() }} </td>
			<td class="text-center"> {{ $value->booksReturnedQty->count() }} </td>
			<td class="text-center">
				<a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-show-request-details','id' => Crypt::encrypt($value->borrow_id)]) }}" onclick="return modalshowrequestdetails(this)" class="btn btn-primary btn-xs" data-toggle="tooltip" data-title="Show Details" data-placement="left"><i class="fa fa-eye"></i></a>
				<a href="{{ route('librarace.route',['path' => $path,'action' => 'librarace-complete-request','id' => Crypt::encrypt($value->borrow_id)]) }}" class="btn btn-success btn-xs" onclick="return confirm('Are you sure you want to tag as completed request?')" data-toggle="tooltip" data-title="Finish Request" data-placement="top"><i class="fa fa-arrow-right"></i></a>
			</td>
		</tr>
		@endforeach
	</tbody>
</table>