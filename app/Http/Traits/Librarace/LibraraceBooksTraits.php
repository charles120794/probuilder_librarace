<?php

namespace App\Http\Traits\Librarace;

use Hash;
use Crypt;
use Session;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait LibraraceBooksTraits
{ 

 	public function librarace_create_book($method, $id = null, $request)
 	{

 		$books = app('LibraraceBooks')
					->where('category_id',$request->category_id)
		 			->where('book_isbn',$request->book_isbn)
		 			->where('book_item',$request->book_item)
		 			->first();

		if( count($books) > 0 ) {
			Session::flash('failed','Book is already exists to this Group');
			return back();
		} else {

			$this->validate($request,[ 'book_image' => 'mimes:'.$this->validatefile('I')]);

			$array = [
				'category_id' => $request->category_id,
				'book_isbn' => strtoupper($request->book_isbn),
				'book_item' => strtoupper($request->book_item),
				'book_image' => $this->profileUpload($request,'book_image'),
				'book_description' => strtoupper($request->book_description),
				'book_title' =>strtoupper( $request->book_title),
				'book_subject' => strtoupper($request->book_subject),
				'book_author' => strtoupper($request->book_author),
				'book_published_date' => $request->book_published_date,
				'order_level' => (new CommonService)->orderLevel(app('LibraraceBooks')),
				'created_by' => $this->thisUser()->id,
				'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
			];

			if(app('LibraraceBooks')->insert($array)) {
				Session::flash('success','New book successfully created');
				return back();
			}

		}

 	}

 	public function librarace_edit_book($method, $id = null, $request)
 	{
 		$Books = app('LibraraceBooks')->where('book_id', Crypt::decrypt($id))->first();

 		if(count($Books) > 0) {
 			return (new CommonService)->view_blade($method)
 		                ->with('Books', $Books)
 		                ->with('BooksCategory', $this->allBooksCategory()->get())
 		                ->with('webdata', $this);
 		} else {
 		    Session::flash('failed','Book do not exists.');
 		    return back();
 		}
 	}

 	public function librarace_update_book($method, $id = null, $request)
 	{

 		$books = app('LibraraceBooks')->where('book_id', decrypt($id))->first();

		if(count($books) > 0) {

			$array = [
				'category_id' => $request->category_id,
				'book_isbn' => strtoupper($request->book_isbn),
				'book_item' => strtoupper($request->book_item),
				'book_description' => strtoupper($request->book_description),
				'book_title' =>strtoupper( $request->book_title),
				'book_subject' => strtoupper($request->book_subject),
				'book_author' => strtoupper($request->book_author),
				'book_published_date' => $request->book_published_date,
				'updated_by' => $this->thisUser()->id,
				'updated_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
			];
 
			if($request->hasFile('book_image')) 
			{
				$array = array_add($array, 'book_image', $this->profileUpload($request,'book_image', $books->book_image) );
			}

			app('LibraraceBooks')->where('book_id', decrypt($id))->update($array);

			Session::flash('success','Book successfully updated');
			return back();

		} else {

			Session::flash('failed','Something went wrong, Please try again.');
			return back();

		}

 	}

 	public function librarace_toggle_book($method, $id = null, $request)
 	{
 		$Books = app('LibraraceBooks')->where('book_id', decrypt($id));
 		if(count($Books->first()) > 0) {
 			return $Books->update(['status' => $request->status]);
 		}
 	}

 	public function librarace_delete_book($method, $id = null, $request)
 	{
 		$Books = app('LibraraceBooks')->where('book_id', decrypt($id));
 		if(count($Books->first()) > 0) {
 			$Books->delete();
 			Session::flash('success','Book successfully deleted');
 			return back();
 		}
 	}

}