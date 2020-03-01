<?php

namespace App\Http\Traits\Settings;

use Auth;
use Hash;
use Crypt;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

trait UsersInformationTrait 
{

	public function activeUsers()
	{
		return app('Users')->where('status','1')->get();
	}

	public function thisUser($id = null)
	{

		$userId = (is_null($id)) ? Auth::User()->id : $id ;

		return app('Users')->where('id', $userId)->first();

	}

	public function thisUserDefaultCompany($id = null)
	{

		$userId = (is_null($id)) ? $this->thisUser()->id : $id ;

		$thisUser = app('Users')->where('id',$userId)->first();

		return $thisUser->hasCompany()->first();

	}

	public function usersActiveModule()
	{
	    $explode = explode('/', request()->path());
	    /* Atleast return 1 */
		return (count($explode) > 0) ? $explode[0] : '' ;
	}

	public function usersActivePath()
	{
		$explode = explode('/', request()->path());
		/* Atleast return 2 or more */
		return (count($explode) > 1) ? $explode[1] : '' ;
	}

	public function usersCompany($id = null)
	{
		
		$userCompany = (is_null($id)) ? $this->getCompanyAccess($this->thisUser()->id) : $this->getCompanyAccess($id) ; 

		return app('SystemCompany')->whereIn('company_id', $userCompany)->where('status','1')->orderBy('order_level','asc')->get();

	}

	public function allusersPerCompany()
	{

		$users = app('Users')->where('status','1');

		if( $this->thisUser()->position == '3' ) {

			$users = $users->where('company_id', $this->thisUser()->company_id);

		} else if ( $this->thisUser()->position == '2' ) {

			$users = $users->where('company_id', $this->thisUser()->company_id);

		} else if ( $this->thisUser()->position == '1' ) {

			$users = $users;

		}

		return $users->get();

	}

	public function getUser($id)
	{
		return app('Users')->where('id',Crypt::decrypt($id))->first();
	}

	public function getCompanyModuleAccess($id)
	{

		$systemCompany = app('SystemCompany')->where('company_id',$id)->first();
		
		$moduleAccess = $systemCompany->modulesAccess()->get();

		return (count($moduleAccess) > 0) ? array_pluck($moduleAccess,'module_id') : [];

	}

	/* USER COMPANY ACCESS */
	public function getCompanyAccess($id)
	{

		$user = app('Users')->where('id', $id)->first();

		$companyAccess = $user->companyAccess()->get();

		return (count($companyAccess) > 0) ? array_pluck($companyAccess,'company_id') : [];

	} 
	/* USERS WINDOW ACCESS */
	public function getWindowAccess($users_id, $module_to = null, $module_from = null)
	{

		$dbConnection = (new CommonService)->thisModule($module_to);

		$windowAccess = app('UsersWindowAccess')
							->setConnection($dbConnection['module_connection'])
							->where('users_id', $this->thisUser($users_id)->id);

		if (!is_null($module_to)) {
			$windowAccess = $windowAccess->where('module_to', $module_to);
		}

		if (!is_null($module_from)) {
			$windowAccess = $windowAccess->where('module_from', $module_from);
		}

			$windowAccess = $windowAccess->get();

			return (count($windowAccess) > 0) ? array_pluck($windowAccess,'menu_id') : [];

	}
	/* USERS MODULE ACCESS */
	public function getModuleAccess($id)
	{

		$user = app('Users')->where('id', $id)->first();

		$windowModule = $user->moduleAccess()->get();

		return (count($windowModule) > 0) ? array_pluck($windowModule,'module_id') : [];

	}
	/* USERS METHOD ACCESS */
	public function getMethodAccess($id)
	{

		$user = app('Users')->where('id', $id)->first();

		$methodAccess = $user->windowMethodAccess()->get();

		return (count($user) > 0) ? array_pluck($methodAccess,'method_id') : [] ;

	}

	public function allUser(){
		
		$users = app('Users');

		$users = ($this->thisUser()->position == 3) ? $users->where('id' , $this->thisUser()->id) : $users ;

		return $users->get();

	}

}