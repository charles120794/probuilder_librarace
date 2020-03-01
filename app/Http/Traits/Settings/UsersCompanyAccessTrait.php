<?php

namespace App\Http\Traits\Settings;

use Crypt;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait UsersCompanyAccessTrait
{

	public function settings_create_users_company_access($method, $id = null, $request)
	{

	}

	public function settings_update_users_company_access($method, $id = null, $request)
	{
		if( !is_null($request->company ) ) {
			foreach ($request->company as $key => $value) {

				$companyAccess = app('UsersCompanyAccess')
			    						->where('users_id', Crypt::decrypt($value['users_id']))
			    						->where('company_id', Crypt::decrypt($value['company_id']));
			    						
			    if( array_key_exists('checkbox', $value) ) {

			    	if( count($companyAccess->first()) == 0 ) {
				        app('UsersCompanyAccess')->insert([
				        	'users_id' => Crypt::decrypt($value['users_id']), 
				        	'company_id' => Crypt::decrypt($value['company_id']),
				        	'created_by' => $this->thisUser()->id,
				        	'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),  
				        ]);
				    } 

				} else {
					/* DELETE IF EXISTS BUT NOT SELECTED */
					$companyAccess->delete();
				}
			}
		}
	}

	public function settings_delete_users_company_access($method, $id = null, $request)
	{
		
	}

}