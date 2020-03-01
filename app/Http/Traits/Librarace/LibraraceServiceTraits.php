<?php

namespace App\Http\Traits\Librarace;

use Illuminate\Http\Request;

trait LibraraceServiceTraits
{ 

	public function allBanner($id = null)
	{

		$model = app('LibraraceBanner');

		return (!is_null($id)) ? $model->where('banner_id', $id) : $model ;

	}

	public function allBooks($id = null)
	{

		$model = app('LibraraceBooks');

		return (!is_null($id)) ? $model->where('book_id', $id) : $model ;

	}

	public function allBooksCategory($id = null)
	{

		$model = app('LibraraceBooksCategory');

		return (!is_null($id)) ? $model->where('category_id', $id) : $model ;

	}

	public function allBooksLocation($id = null)
	{

		$model = app('LibraraceBooksLocation');

		return (!is_null($id)) ? $model->where('location_id', $id) : $model ;

	}

	public function allBorrow($id = null)
	{

		$model = app('LibraraceBorrow');

		return (!is_null($id)) ? $model->where('borrow_id', $id) : $model ;

	}

	public function allBorrowDetails($id = null)
	{

		$model = app('LibraraceBorrowDetails');

		return (!is_null($id)) ? $model->where('detail_id', $id) : $model ;

	}

	public function allUsersData($id = null){

		$model = app('LibraraceUsersData');

		return (!is_null($id)) ? $model->where('student_id', $student_id) : $model ;

	}

	public function serializedBookInfo($bookData, $collect = [])
	{

		foreach($bookData as $value) 
		{
			$newBookData[] = $this->serializedBook($value);
		}

		return $newBookData;

	}

	public function serializedBook($value)
	{
		return [
			'category_name' => $value->categoryinfo->category_description,
			'book_id' => $value->book_id,
			'book_isbn' => $value->book_isbn,
			'book_item' => $value->book_item,
			'book_image' => $value->book_image,
			'book_title' => $value->book_title,
			'book_author' => $value->book_author,
			'book_reserve' => $value->book_reserve,
			'book_subject' => $value->book_subject,
			'book_description' => $value->book_description,
			'book_published_date' => $value->book_published_date,
			'book_availability_status' => $value->borrowDetailsInfo['status'],
			'book_due_date' => $value->borrowDetailsInfo['date_to'],
			'book_returned_date' => $value->borrowDetailsInfo['date_returned'],
		];
	}

}