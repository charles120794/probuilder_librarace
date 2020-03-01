<?php

namespace App\Http\Traits\Librarace;

use Hash;
use Crypt;
use Session;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait LibraraceBooksIssuanceTraits
{ 
	public function librarace_show_request_details($method, $id = null, $request)
	{

		$BorrowDetails = app('LibraraceBorrowDetails')
							->where('borrow_id', decrypt($id))
							->get();

		return (new CommonService)->view_blade($method)
							->with('BorrowId', decrypt($id))
							->with('BorrowDetails', $BorrowDetails);

	}

	public function librarace_approve_issue_book_request($method, $id = null, $request)
	{

		$books_appproved = [];

		foreach ($request->books as $key => $value) 
		{
			if(array_key_exists('book_issued', $value)) 
			{
				$isBookIssued = app('LibraraceBorrowDetails')
								->where('book_id', decrypt($value['book_id']))
								->where('status', 'IS')
								->first();

				if(count($isBookIssued) > 0) 
				{
					Session::flash('failed', 'Sorry! Book with Item Code of ' . $isBookIssued->bookInfo->book_item . ' is already issued.');
					return back();
				} 
				else 
				{
					$books_appproved[] = app('LibraraceBorrowDetails')
							->where('detail_id', decrypt($value['book_issued']))
							->update(['status' => 'IS']);
				}
			}
		}

		Session::flash('success',count($books_appproved) . ' Books successfully issued.');
		return back();

	}

	public function librarace_complete_request($method, $id = null, $request)
	{

		$BorrowDetails = app('LibraraceBorrowDetails')
							->where('borrow_id', decrypt($id))
							->where('status','!=','RE')
							->Where('status','!=','CA')
							->Where('status','!=','LO')
							->Where('status','!=','PD')
							->get();

		if(count($BorrowDetails) > 0) 
		{
			Session::flash('failed','Unable to complete this request, ' . count($BorrowDetails) . ' Book(s) are/is not yet returned.');
			return back();
		} 
		else 
		{
			app('LibraraceBorrow')
				->where('borrow_id', decrypt($id))
				->update(['status' => 'F']);

			Session::flash('success','Request was successfully completed.');
			return back();
		}

	}

}