<?php

namespace App\Http\Traits\Settings;

use Crypt;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait SystemCompanyTrait
{

    public function settings_create_users_company($method, $id = null, $request)
    {

        $this->validate($request, [
            'company_logo' => 'mimes:'.$this->validatefile('I'),
            'company_cover_photo' => 'mimes:'.$this->validatefile('I'),
        ]);

        $exists_count = app('SystemCompany')->where('company_code', $request->company_code)
                        ->where('company_name', $request->company_name)
                        ->where('company_description', $request->company_description)
                        ->first();

        $array = [
            'company_code' => strtoupper($request->company_code),
            'company_name' => strtoupper($request->company_name),
            'company_description' => strtoupper($request->company_description),
            'company_email' => $request->company_email,
            'company_tagline' => strtoupper($request->company_tagline),
            'company_location' => strtoupper($request->company_location),
            'company_address' => strtoupper($request->company_address),
            'company_contact_phone' => $request->company_contact_phone,
            'company_contact_number' => $request->company_contact_number,
            'company_registered_owner' => strtoupper($request->company_registered_owner),
            'company_foundation' => $request->company_foundation,
            'company_license_no' => $request->company_license_no,
            'company_system_users' => $request->company_system_users,
            'company_facebook' => $request->company_facebook,
            'company_twitter' => $request->company_twitter,
            'company_pinterest' => $request->company_pinterest,
            'company_instagram' => $request->company_instagram,
            'company_logo' => $this->profileUpload($request,'company_logo'),
            'company_cover_photo' => $this->profileUpload($request,'company_cover_photo'),
            'created_by' => $this->thisUser()->id,
            'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
        ];

        if(count($exists_count) > 0) {

            Session::flash('failed','This company code, name or description is already exists, Please try other company info.');
            return back()->withInput();

        } else {

            if( app('SystemCompany')->insert($array) ) {

                Session::flash('success','New Company successfully created');
                return back();

            } else {

                Session::flash('failed','An Error occur when generating data, Please try again');
                return back()->withInput();

            }

        }

    }

    public function settings_update_users_company($method, $id = null, $request)
    {
       
    }

    public function settings_delete_users_company($method, $id = null, $request)
    {
     
    }

    public function settings_toggle_users_company($method, $id = null, $request)
    {
        
    }
    
}
