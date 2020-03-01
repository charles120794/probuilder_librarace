<?php

namespace App\Http\Controllers\Librarace;

use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\LibraraceMainController;
use App\Http\Controllers\Common\CommonServiceController as CommonService;

class LibraraceController extends LibraraceMainController 
{

	protected $host = 'auth-db161.hostinger.com';

	protected $database = 'u829292030_4ZfPQ';
	
	protected $username = 'u829292030_fyDfj';

	protected $password = 'gZ9b5MSm';

	public function validateUsersModuleExists()
	{

	    $systemModule = (new CommonService)->thisModuleByCode();

	    return (count($systemModule) > 0 ) ? in_array( $systemModule['module_id'], $this->getModuleAccess($this->thisUser()->id) ) : false ;

	}
	
	public function activeAdmin($path , $action = null, $id = null, Request $request)
	{
	    if($this->validateUsersModuleExists()) {
	        if($this->validateUsersModuleAccess()) {
	            if($this->validateUsersWindowExists($path)->count() > 0) {
	                if($this->validateUsersWindowAccess($this->validateUsersWindowExists($path))) {
	                    if(!is_null($action) && !is_null($id)) {

	                        return $this->activemethod($action, $id, $this->validateUsersWindowExists($path)->first(), $request);
	                        
	                    } else {

	                        $windowPath = $this->validateUsersWindowExists($path)->first()->menu_blade;

	                        if(\View::exists($windowPath)) {
	                            return view($windowPath)->with('path', $path)->with('module', $this->usersActiveModule())->with('webdata', $this);
	                        } else {
	                            Session::flash('failed','Error #005 - The page or url you are looking do not exists to this module');
	                            return back();
	                        } 

	                    }
	                } else {
	                    Session::flash('failed','Error #004 - You do not have permission to access this window.');
	                    return back();
	                    return $this->error404();
	                }
	            } else {
	                Session::flash('failed','Error #003 - The page or url you are looking do not exists to this module');
	                return back();
	                return $this->error404();
	            }
	        } else {
	            Session::flash('failed','Error #002 - You do not have permission to access this module, Contact your system administrator for more info.');
	            return back();
	        }
	    } else {
	        Session::flash('failed','Error #001 - You have entered an invalid url that is not recognizable.');
	        return back();
	    }

	}

	public function activemethod($action, $id, $checkpath, $request)
	{
	    
	    $checker = $checkpath->subClassMethod()->where('method_name',$action);

	    if ($checker->count() > 0) {

	        $method = ($checker->count() > 0) ? $checker->first() : ['method_function' => ''];

	        if(method_exists(app($method['method_traits']), $method['method_function'])) {   

	            $function = $method->method_function;

	            return $this->$function($method, $id, $request);

	        } else {
	            Session::flash('failed','Error #101 - System method do not exists to this module.');
	            return $this->error404();
	        }

	    } else {
	        Session::flash('failed','Error #102 - System sub class method do not exists.');
	        return $this->error404();
	    }

	}

	public function validateUsersModuleAccess()
	{
	    $systemModule = (new CommonService)->thisModuleByCode();

	    $moduleAccess = $this->getModuleAccess($this->thisUser()->id);

	    return (count($systemModule) > 0) ? in_array($systemModule['module_id'], $moduleAccess) : false ;
	}

	public function validateUsersWindowExists($path)
	{
	    return app('SystemWindow')->where('menu_path', $path); 
	}

	public function validateUsersWindowAccess($windowId)
	{
	    $systemModule = (new CommonService)->thisModuleByCode();

	    $windowAccess = $this->getWindowAccess($this->thisUser()->id, $systemModule['module_id']);

	    return in_array($windowId->first()->menu_id, $windowAccess);
	}

	public function validateUsersWindowMethodAccess($action) 
	{
	    $method = app('SystemWindowMethod')->where('method_name', $action)->first();
	}

	public function error404()
	{
	    return redirect('/welcome');
	}

}