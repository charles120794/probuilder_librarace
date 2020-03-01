<?php

namespace App\Http\Traits\Librarace;

use Hash;
use Crypt;
use Session;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait LibraraceBooksCategoryTraits
{ 

 	public function librarace_create_book_category($method, $id = null, $request)
 	{

 		$Category = app('LibraraceBooksCategory')->where('category_code', $request->category_code)->first();

 		if( count($Category) > 0 ) {

 			Session::flash('failed','Category Code already exists.');
 			return back();

 		} else {

 			$array = [
 				'category_code' => strtoupper($request->category_code),
 				'category_description' => strtoupper($request->category_description),
 				'location_id' => strtoupper($request->category_location),
 				'category_book_penalty' => strtoupper($request->category_penalty),
 				'order_level' => (new CommonService)->orderLevel(app('LibraraceBooksCategory')),
 				'created_by' => $this->thisUser()->id,
 				'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
 			];

 			if( app('LibraraceBooksCategory')->insert($array) ) 
 			{
 				Session::flash('success','Category successfully created.');
 				return back();
 			}

 		}

 	}

 	public function librarace_edit_book_category($method, $id = null, $request)
 	{
 		$Category = app('LibraraceBooksCategory')->where('category_id', Crypt::decrypt($id))->first();

 		if(count($Category) > 0) {
 			return (new CommonService)->view_blade($method)
 		                ->with('BooksCategory', $Category)
 		                ->with('BooksLocation', $this->allBooksLocation()->get())
 		                ->with('webdata', $this);
 		} else {
 		    Session::flash('failed','Book Category do not exists.');
 		    return back();
 		}
 	}

 	public function librarace_update_book_category($method, $id = null, $request)
 	{

 		$Category = app('LibraraceBooksCategory')->where('category_id', decrypt($id))->first();

 		if( count($Category) > 0 ) {

 			$array = [
 				'category_code' => strtoupper($request->category_code),
 				'category_description' => strtoupper($request->category_description),
 				'location_id' => strtoupper($request->category_location),
 				'category_book_penalty' => strtoupper($request->category_penalty),
 				'updated_by' => $this->thisUser()->id,
 				'updated_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
 			];

 			app('LibraraceBooksCategory')->where('category_id', decrypt($id))->update($array);

			Session::flash('success','Category successfully updated.');
			return back();

 		} else {

 			Session::flash('failed','Something went wrong, Please try again.');
 			return back();

 		}

 	}

 	public function librarace_toggle_book_category($method, $id = null, $request)
 	{
 		$Category = app('LibraraceBooksCategory')->where('category_id', decrypt($id));
 		if(count($Category->first()) > 0) {
 			return $Category->update(['status' => $request->status]);
 		}
 	}

 	public function librarace_delete_book_category($method, $id = null, $request)
 	{
 		$Category = app('LibraraceBooksCategory')->where('category_id', decrypt($id));
 		if(count($Category->first()) > 0) {
 			if($Category->first()->booksQuantity->count() > 0) {
 				Session::flash('failed','Unable to delete category with a quantity of greater than zero.');
 				return back();
 			} else {
 				$Category->delete();
 				Session::flash('success','Category successfully deleted');
 				return back();
 			}
 		} else {
 			Session::flash('failed','Something went wrong, Please try again.');
 			return back();
 		}
 	}

}