<?php

namespace App\Http\Traits\Librarace;

use Hash;
use Crypt;
use Session;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait LibraraceTraits
{

	public function librarace_search_student_no($method, $id = null, $request, $result = [])
	{
		$student = $this->allUsersData(Crypt::decrypt($request->student))->first();

		$result['student_id'] = Crypt::encrypt($student->student_id);
		$result['student_name'] = $student->firstname . ' ' . $student->middlename . ' ' . $student->lastname;

		return response()->json($result);
	}

	public function librarace_search_all_books($method, $id = null, $request) 
	{

		$books = app('LibraraceBooks')->where('status','1');

		if(!is_null($request->title)) {
			$books = $books->where('book_title','like',$request->title.'%');
		}

		if(!is_null($request->author)) {
			$books = $books->where('book_author','like',$request->author.'%');
		}

		if(!is_null($request->subject)) {
			$books = $books->where('book_subject','like',$request->subject.'%');
		}

		if(!is_null($request->date_published)) {
			$books = $books->where('book_published_date','like',$request->title.'%');
		}

		return $books->paginate(15);

	}

 	public function librarace_create_new_student($method, $id = null, $request)
 	{

 		$student = app('LibraraceUsersData')
 			->where('student_no', $request->student_no)
 			->where('email', $request->email)->first();

 		if( count($student) > 0 ) {

			Session::flash('failed','Student number and email already exists.');
			return back();

 		} else {

 			$password = $request->password;
 			$confirmPassword = bcrypt($request->confirm_password);

 			if( !Hash::check($password, $confirmPassword) ) {

 				Session::flash('failed','Student password do not match');
 				return back();

 			} else {

 				$array = [
 					'student_no' => strtoupper($request->student_no),
 					'email' => $request->email,
 					'contact' => strtoupper($request->contact),
 					'firstname' => strtoupper($request->firstname),
 					'middlename' => strtoupper($request->middlename),
 					'lastname' => strtoupper($request->lastname),
 					'username' => $request->username,
 					'password' => bcrypt($request->confirm_password),
 					'created_by' => $this->thisUser()->id,
 					'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
 				];

 				if( app('LibraraceUsersData')->insert($array) ) {
 					Session::flash('success','Student information created successfully');
 					return back();
 				}

 			}
 			
 		}

 	}
 	
}