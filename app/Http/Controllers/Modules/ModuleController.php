<?php

namespace App\Http\Controllers\Modules;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ModuleController extends Controller 
{

	public function moduleDashboard()
	{
		return view('welcome')->with('webdata',$this);
	}

	public function activeModule($moduleCode)
	{
		$module = app('SystemModule')->where('status','1');

		return (!is_null($moduleCode)) ? $module->where('module_code', $moduleCode)->first() : $module->get() ; 
	}

	public function usersModule()
	{
		return app('SystemModule')->where('status','1')->orderBy('order_level','asc')->get();
	}

	public function usersModuleAccess($array = [])
	{
		return (count($array) > 0 ) ? app('SystemModule')->where('status','1')->whereIn('module_id',$array)->orderBy('order_level','asc')->get() : $array ;
	}

	public function usersAllModule()
	{
		return app('SystemModule')->orderBy('order_level','asc')->get();
	}

}