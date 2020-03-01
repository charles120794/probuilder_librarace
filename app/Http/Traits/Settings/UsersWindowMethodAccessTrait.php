<?php 

namespace App\Http\Traits\Settings;

use Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait UsersWindowMethodAccessTrait
{
	public function settings_create_users_method_access($method, $id = null, $request)
	{

	}

	public function settings_update_users_method_access($method, $id = null, $request)
	{
		if( !is_null($request->method) ) {
			foreach($request->method as $key => $value) {

				$methodAccess = app('UsersWindowMethodAccess')
									->where('users_id', Crypt::decrypt($value['users_id']))
									->where('method_id', Crypt::decrypt($value['method_id']));
									
				if( array_key_exists('checkbox', $value) ) { 

					if( count($methodAccess->first()) == 0 ) {
						app('UsersWindowMethodAccess')->insert([
							'users_id' => Crypt::decrypt($value['users_id']),
							'method_id' => Crypt::decrypt($value['method_id']),
							'created_by' => $this->thisUser()->id,
							'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
						]);
					}

				} else {
					/* DELETE IF EXISTS BUT NOT SELECTED */
					$methodAccess->delete();
				}
			}
		}

	}

	public function settings_delete_users_method_access($method, $id = null, $request)
	{
		
	}

}