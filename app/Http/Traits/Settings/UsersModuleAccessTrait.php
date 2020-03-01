<?php 

namespace App\Http\Traits\Settings;

use Crypt;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait UsersModuleAccessTrait
{
	public function settings_create_users_module_access($method, $id = null, $request)
	{

	}

	public function settings_update_users_module_access($method, $id = null, $request)
	{
		if( !is_null($request->module ) ) {
			foreach ($request->module as $key => $value) {

				$dbConnection = (new CommonService)->thisModule(Crypt::decrypt($value['module_id']));
				
				$moduleAccess = app('UsersModuleAccess')
			    					->where('users_id', Crypt::decrypt($value['users_id']))
			    					->where('module_id', Crypt::decrypt($value['module_id']));

			    if( array_key_exists('checkbox', $value) ) {

			    	if( count($moduleAccess->first()) == 0 ) {
				        app('UsersModuleAccess')->insert([ 	
			        		'users_id' => Crypt::decrypt($value['users_id']), 
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

	public function settings_delete_users_module_access($method, $id = null, $request)
	{
		
	}
}