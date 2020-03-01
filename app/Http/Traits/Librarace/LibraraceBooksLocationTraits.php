<?php

namespace App\Http\Traits\Librarace;

use Crypt;
use Session;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait LibraraceBooksLocationTraits
{ 

 	public function librarace_create_book_location($method, $id = null, $request)
 	{

 		$Location = app('LibraraceBooksLocation')->where('location_code', $request->location_code)->first();

 		if( count($Location) > 0 ) {

 			Session::flash('failed','Location Code already exists.');
 			return back();

 		} else {

 			$array = [
 				'location_code' => strtoupper($request->location_code),
 				'location_description' => strtoupper($request->location_description),
 				'order_level' => (new CommonService)->orderLevel(app('LibraraceBooksLocation')),
 				'created_by' => $this->thisUser()->id,
 				'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
 			];

 			if( app('LibraraceBooksLocation')->insert($array) ) 
 			{
 				Session::flash('success','Book Location successfully created.');
 				return back();
 			}

 		}

 	}

 	public function librarace_edit_book_location($method, $id = null, $request)
 	{
 		$Location = app('LibraraceBooksLocation')->where('location_id', Crypt::decrypt($id))->first();

 		if(count($Location) > 0) {
 			return (new CommonService)->view_blade($method)
 		                ->with('Location', $Location)
 		                ->with('webdata', $this);
 		} else {
 		    Session::flash('failed','Book Location do not exists.');
 		    return back();
 		}
 	}

 	public function librarace_update_book_location($method, $id = null, $request)
 	{

 		$Location = app('LibraraceBooksLocation')->where('location_id', decrypt($id))->first();

 		if( count($Location) > 0 ) {

 			$array = [
 				'location_code' => strtoupper($request->location_code),
 				'location_description' => strtoupper($request->location_description),
 				'updated_by' => $this->thisUser()->id,
 				'updated_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
 			];

 			app('LibraraceBooksLocation')->where('location_id', decrypt($id))->update($array);

			Session::flash('success','Book Location successfully updated.');
			return back();

 		} else {

 			Session::flash('failed','Something went wrong, Please try again.');
 			return back();

 		}

 	}

 	public function librarace_toggle_book_location($method, $id = null, $request)
 	{
 		$Location = app('LibraraceBooksLocation')->where('location_id', decrypt($id));
 		if(count($Location->first()) > 0) {
 			return $Location->update(['status' => $request->status]);
 		}
 	}

 	public function librarace_delete_book_location($method, $id = null, $request)
 	{
 		$Location = app('LibraraceBooksLocation')->where('location_id', decrypt($id));
 		if(count($Location->first()) > 0) {
 			if($Location->first()->CategoryInfo->count() > 0) {
 				Session::flash('failed','Unable to delete location with a group of greater than zero.');
 				return back();
 			} else {
 				$Location->delete();
 				Session::flash('success','Book Location successfully deleted');
 				return back();
 			}
 		} else {
 			Session::flash('failed','Something went wrong, Please try again.');
 			return back();
 		}
 	}

}