<?php 

namespace App\Http\Traits\Settings;

use Crypt;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait UsersWindowAccessTrait
{
	public function settings_create_users_window_access($method, $id = null, $request)
	{

	}

	public function settings_update_users_window_access($method, $id = null, $request) 
	{

		if( !is_null($request->window ) ) {

		    foreach ($request->window as $key => $value) {

		    	$dbConnection = (new CommonService)->thisModule(Crypt::decrypt($value['module_to']));

		    	$windowAccess = app('UsersWindowAccess')
		    						->setConnection($dbConnection['module_connection'])
		    						->where('menu_id', Crypt::decrypt($value['menu_id']))
		    						->where('users_id', Crypt::decrypt($value['users_id']))
		    						->where('menu_parent', Crypt::decrypt($value['menu_parent']))
		    						->where('menu_type', Crypt::decrypt($value['menu_type']))
		    						->where('module_to', Crypt::decrypt($value['module_to']))
		    						->where('module_from', Crypt::decrypt($value['module_from']));

		    	if( array_key_exists( 'checkbox' , $value ) ) {

		        	if( count($windowAccess->first()) == 0 ) {
		        		
		        		$array = [ 
	                		'menu_id' => Crypt::decrypt($value['menu_id']), 
	                		'users_id' => Crypt::decrypt($value['users_id']),
	                		'menu_parent' => Crypt::decrypt($value['menu_parent']),
	                		'menu_type' => Crypt::decrypt($value['menu_type']),
	                		'module_to' => Crypt::decrypt($value['module_to']),
	                		'module_from' => Crypt::decrypt($value['module_from']),
	                		'created_by' => $this->thisUser()->id,
							'created_date' => (new CommonService)->dateTimeToday('Y-m-d h:i:s'),
                		];

                		app('UsersWindowAccess')
	                		->setConnection($dbConnection['module_connection'])
	        				->insert($array);

		            }

		        } else {
		        	/* DELETE IF EXISTS BUT NOT SELECTED */
	                $windowAccess->delete();
		        }

		    }

		}

	}

	public function settings_delete_users_window_access($method, $id = null, $request)
	{
		
	}
}