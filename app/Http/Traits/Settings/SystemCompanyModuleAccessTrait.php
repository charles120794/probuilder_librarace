<?php

namespace App\Http\Traits\Settings;

use Crypt;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait SystemCompanyModuleAccessTrait
{
	public function settings_create_company_module_access($method, $id = null, $request)
	{

	}

	public function settings_update_company_module_access($method, $id = null, $request)
	{
		if( !is_null($request->module ) ) {
			foreach ($request->module as $key => $value) {
				
				$moduleAccess = app('CompanyModuleAccess')
			    					->where('company_id', Crypt::decrypt($value['company_id']))
			    					->where('module_id', Crypt::decrypt($value['module_id']));

			    if( array_key_exists('checkbox', $value) ) {

			    	if( count($moduleAccess->first()) == 0 ) {
				        app('CompanyModuleAccess')->insert([ 	
				        		'company_id' => Crypt::decrypt($value['company_id']), 
				        		'module_id' => Crypt::decrypt($value['module_id']),
				        		'created_by' => $this->thisUser()->id,
				        		'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'), 
				        ]);
				    } 

				} else {
					/* DELETE IF EXISTS BUT NOT SELECTED */
					$moduleAccess->delete();
				}
			}
		}
	}

	public function settings_delete_company_module_access($method, $id = null, $request)
	{
		
	}
}