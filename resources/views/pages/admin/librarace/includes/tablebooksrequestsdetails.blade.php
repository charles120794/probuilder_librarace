<div class="row">
	<div class="col-sm-12">
		<div class="panel panel-default" style="overflow: auto;">
			<input type="hidden" name="borrow_id" value="{{ $BorrowId }}">
			<table id="datatable" class="table table-bordered table-hover" style="font-size: 13px;">
				<thead>
					<tr class="bg-gray-light">
						<th class="text-center"> ID </th>
						<th class="text-center"> LOCATION </th>
						<th class="text-center"> GROUP </th>
						<th class="text-center"> BOOK CODE </th>
						<th class="text-center"> DATE FROM </th>
						<th class="text-center"> DATE TO </th>
						<th class="text-center"> DATE RETURNED </th>
						<th class="text-center"> STATUS </th>
						<th class="text-center"> ACTION </th>
					</tr>
				</thead>
				<tbody>
					@foreach($BorrowDetails as $key => $value)
					<tr>
						<td> {{ ($key + 1) }} </td>
						<td> {{ $value->bookInfo->categoryInfo->locationInfo->location_code }}</td>
						<td> {{ $value->bookInfo->categoryInfo->category_code }}</td>
						<td> {{ $value->bookInfo->book_item }} </td>
						<td class="text-center"> {{ $value->date_from }} </td>
						<td class="text-center"> {{ $value->date_to }} </td>
						<td class="text-center"> {{ $value->date_returned }} </td>
						<td class="text-center"> 

							@if($value->bookAlreadyIssued($value->book_id)->count() > 0) 

								<b class="text-green">Issued</b> 

							@else 

								@if($value->status == 'PE') <b class="text-green">Pending</b> @endif
								@if($value->status == 'RE') <b class="text-green">Returned</b> @endif 
								@if($value->status == 'CA') <b class="text-red">Cancelled</b> @endif 
								@if($value->status == 'LO') <b class="text-red">Lost</b> @endif 
								@if($value->status == 'PD') <b class="text-red">Post Dated</b> @endif 

							@endif 
							
						</td>
						<td class="text-center" style="padding: 4px;">
							<input type="hidden" name="books[{{ $key }}][book_id]" value="{{ encrypt($value->book_id) }}">
							<input type="checkbox" name="books[{{ $key }}][book_issued]" value="{{ encrypt($value->detail_id) }}" style="height: 16px; width: 16px;" @if($value->bookAlreadyIssued($value->book_id)->count() > 0) disabled @endif>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>