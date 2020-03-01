<?php

namespace App\Http\Traits\Librarace;

use Hash;
use Crypt;
use Session;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait LibraraceUsersTraits
{ 

 	public function librarace_create_user_data($method, $id = null, $request)
 	{

 		$student = app('LibraraceUsersData')
 		 			->where('user_code', $request->student_no)
 		 			->where('user_email', $request->email)->first();

		if( count($student) > 0 ) {

			Session::flash('failed','Student ID Number and Email already exists.');
			return back();

		} else {

			$password = $request->password;
			$confirmPassword = bcrypt($request->confirm_password);

			if(!Hash::check($password, $confirmPassword)) {

				Session::flash('failed','Student password do not match with confirm password.');
				return back();

			} else {

				$array = [
					'user_code' => strtoupper($request->student_no),
					'user_email' => $request->email,
					'user_contact' => strtoupper($request->contact),
					'user_firstname' => strtoupper($request->firstname),
					'user_middlename' => strtoupper($request->middlename),
					'user_lastname' => strtoupper($request->lastname),
					'user_username' => $request->username,
					'user_password' => bcrypt($request->confirm_password),
					'order_level' => (new CommonService)->orderLevel(app('LibraraceUsersData')),
					'created_by' => $this->thisUser()->id,
					'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
				];

				if(app('LibraraceUsersData')->insert($array)) 
				{
					Session::flash('success','New Student Information created successfully');
					return back();
				}

			}

		}

 	}

 	public function librarace_edit_user_data($method, $id = null, $request)
 	{
 		$Student = app('LibraraceUsersData')->where('user_id', Crypt::decrypt($id))->first();

 		if(count($Student) > 0) {
 			return (new CommonService)->view_blade($method)
 		                ->with('Users', $Student)
 		                ->with('webdata', $this);
 		} else {
 		    Session::flash('failed','Student Data do not exists.');
 		    return back();
 		}
 	}

 	public function librarace_show_user_data($method, $id = null, $request)
 	{
 		$Student = app('LibraraceUsersData')->where('user_id', Crypt::decrypt($id))->first();

 		if(count($Student) > 0) {
 			return (new CommonService)->view_blade($method)
 		                ->with('Users', $Student)
 		                ->with('webdata', $this);
 		} else {
 		    Session::flash('failed','Student Data do not exists.');
 		    return back();
 		}
 	}

 	public function librarace_update_user_data($method, $id = null, $request)
 	{

 		$student = app('LibraraceUsersData')->where('user_id', decrypt($id))->first();

		if(count($student) > 0) {

			$password = $request->password;
			$confirmPassword = bcrypt($request->confirm_password);
		
			$array = [
				'user_code' => strtoupper($request->student_no),
				'user_email' => $request->email,
				'user_contact' => strtoupper($request->contact),
				'user_firstname' => strtoupper($request->firstname),
				'user_middlename' => strtoupper($request->middlename),
				'user_lastname' => strtoupper($request->lastname),
				'user_username' => $request->username,
				'updated_by' => $this->thisUser()->id,
				'updated_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
			];

			if($request->has('old_password')) {

				if(Hash::check($student->user_password, $request->old_password)) {

					if(Hash::check($password, $confirmPassword)) {

						$array = array_add('user_password',$array,bcrypt($request->confirm_password));

					} else {

						Session::flash('failed','Student password do not match with confirm password.');
						return back();

					}

				} else {
					Session::flash('failed','Invalid Old Password, Please try again.');
					return back()->withInput();
				}

			}

			if(app('LibraraceUsersData')->where('user_id', decrypt($id))->update($array)) 
			{
				Session::flash('success','Student Information updated successfully');
				return back();
			}

		} else {

			Session::flash('failed','Something went wrong, Please try again.');
			return back();

		}

 	}

 	public function librarace_toggle_user_data($method, $id = null, $request)
 	{
 		$Books = app('LibraraceUsersData')->where('user_id', decrypt($id));
 		if(count($Books->first()) > 0) {
 			return $Books->update(['status' => $request->status]);
 		}
 	}

 	public function librarace_delete_user_data($method, $id = null, $request)
 	{
 		$Books = app('LibraraceUsersData')->where('user_id', decrypt($id));
 		if(count($Books->first()) > 0) {
 			$Books->delete();
 			Session::flash('success','Student Information successfully deleted');
 			return back();
 		}
 	}

}