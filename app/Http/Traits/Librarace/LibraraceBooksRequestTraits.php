<?php

namespace App\Http\Traits\Librarace;

use Hash;
use Crypt;
use Session;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait LibraraceBooksRequestTraits
{ 
	public function librarace_create_book_request($method, $id = null, $request)
	{

		$array = [
			'user_id' => decrypt($request->student_id),
			'order_level' => (new CommonService)->orderLevel(app('LibraraceBorrow')),
			'created_by' => $this->thisUser()->id,
			'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
		];

		$BorrowId = app('LibraraceBorrow')->insertGetId($array);

		if($BorrowId > 0) {
			foreach ($request->book as $key => $value) {
				if(array_key_exists('book_id', $value))
				{
					$_array = [
						'borrow_id' => $BorrowId,
						'book_id' => decrypt($value['book_id']),
						'date_from' => $value['date_from'],
						'date_to' => $value['date_to'],
					];
					app('LibraraceBorrowDetails')->insert($_array);
				}
			}
		}

		return back();
		
	}
}