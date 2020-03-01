<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Traits\Settings\UsersInformationTrait;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

class WindowController
{
	use UsersInformationTrait;

	public $path;

	public $subkey = 'menu_sub';

	public $submodule = 'module_code';

	public $subactive = 'menu_active';

	public function __construct($path = null)
	{
		$this->path = $path;
	}

	public function usersWindowAccess($id)
	{

		$connection = (new CommonService)->thisModuleByCode()->module_connection;

		$windowAccess = app('UsersWindowAccess')
							->setConnection($connection)
							->where('status','1')
							->where('menu_parent',$id)
							->where('users_id', $this->thisUser()->id)
							->orderBy('order_level','asc');

		return $windowAccess->get();

	}

	public function sideNavClass()
	{	

		$windowAccess = $this->usersWindowAccess(0);

		return $this->systemWindowGetSubClass($windowAccess);

	}

	public function systemWindowGetSubClass($array, $windows = []) {

		foreach ($array as $key => $value) {

			$module = (new CommonService)->thisModuleByCode();

			$systemWindow = $value->systemWindow()->first();

			array_add($systemWindow, $this->submodule, $module->module_code);

			$setActive = ( $systemWindow['menu_path'] == $this->path) ? array_add($systemWindow, $this->subactive, 'active') : null ;

			$windowGetSubClass = $this->systemWindowGetSubClass($this->usersWindowAccess($value->menu_id, $module->module_connection));

			array_add($systemWindow, $this->subkey, $windowGetSubClass); 

			foreach($systemWindow[$this->subkey] as $checkactive)
			{
				( array_has($checkactive, $this->subactive) ) ? 

					array_add($systemWindow, $this->subactive, 'active') : false ;
			}

			$windows[] = $systemWindow;

		}

		return $windows;

	}

}
