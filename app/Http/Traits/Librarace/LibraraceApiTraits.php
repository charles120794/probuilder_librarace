<?php

namespace App\Http\Traits\Librarace;

use Mail;
use Hash;
use Illuminate\Http\Request;
use App\Mail\Librarace\SendReservationRequest as SendEmailRequest;

trait LibraraceApiTraits
{

    public function LibraraceLoginAPI(Request $request) { 

    	$email = $request->email;
    	$password = $request->password;

    	$usersData = app('LibraraceUsersData')->where('user_email', $email)->first();

    	if(count($usersData) > 0) 
        {

    		if( Hash::check($password, $usersData->user_password) ) 
            {

                $data['student_id'] = $usersData->user_id;
                $data['student_no'] = $usersData->user_code;
                $data['email'] = $usersData->user_email;
                $data['firstname'] = $usersData->user_firstname;
                $data['middlename'] = $usersData->user_middlename;
                $data['lastname'] = $usersData->user_lastname;
                $data['contact'] = $usersData->user_contact;

    		    $response['status'] = 'true';
    			$response['data'] = $data;  
    			return $response;

    		} else {

    			$response['status'] = 'false';
    			$response['data'] = [];  
    			return $response;

    		}

    	} else {

    		$response['status'] = 'false';
    		$response['data'] = [];  
    		return $response;

    	}

    }

    public function LibraraceBorrowAPI(Request $request, $errors = []) {

    	if(is_null($request->book_id)) 
        {
            $errors['status'] = 'false';
            $errors['message'] = 'Book is required';
    	}

    	if(is_null($request->student_id)) 
        {
            $errors['status'] = 'false';
            $errors['message'] = 'Student ID is required';
    	}

    	if(is_null($request->date_from)) 
        {
            $errors['status'] = 'false';
            $errors['message'] = 'Date From is required';
    	}

    	if(is_null($request->date_to)) 
        {
            $errors['status'] = 'false';
            $errors['message'] = 'Date To is required';
    	}

        if(count($errors) > 0) {

            return $errors;

        } else {

            $arr_borrow = [
                'user_id' => $request->student_id
            ];

            $ins_borrow = app('LibraraceBorrow')->insertGetId($arr_borrow);

            $arr_borrow_details = [
                'borrow_id' => $ins_borrow,
                'book_id' => $request->book_id, 
                'date_from' =>  $request->date_from,
                'date_to' => $request->date_to,
            ];

            $ins_borrow_details = app('LibraraceBorrowDetails')->insert($arr_borrow_details);

            if($ins_borrow_details) 
            {

                // Mail::to('wongcharlesdave@gmail.com')->send(new SendEmailRequest());
                // Mail::to('wongcharlzalden@gmail.com')->send(new SendEmailRequest());

                $errors['status'] = 'true';
                $errors['message'] = 'Your request was successfully submitted, Please wait for approval';

            } 
            else 
            {
                $errors['status'] = 'false';
                $errors['message'] = 'Cannot proccess you request right now, Please try again later.';
            }

            return $errors;

        }

    }

    public function LibraraceBookInfoAPI(Request $request) {

    	$BookData = $this->allBooks($request->book_id)->get();

    	return $this->serializedBookInfo($BookData);

    }

    public function LibraraceSingleBookAPI(Request $request) {

    	if(!is_null($request->book_id)) {

            $book_data = $this->allBooks($request->book_id)->first();

            if(count($book_data) > 0) {

                $errors['status'] = 'true';
                $errors['message'] = $this->serializedBook($book_data);

            }  else {

                $errors['status'] = 'false';
                $errors['message'] = 'No results found on book list.';

            }

    	} else {

			$errors['status'] = 'false';
            $errors['message'] = 'Book id is required.';

    	}

    	return $errors;

    }

}