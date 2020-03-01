<?php

namespace App\Http\Controllers\Common;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\GenderMainController;

class CommonServiceController extends Controller
{

    public function view_blade($method)
    {
        if(\View::exists($method->method_blade)) {
            return view($method->method_blade)
                        ->with('webdata', $this)
                        ->with('path', $this->getParentPath($method))
                        ->with('module', $this->usersActiveModule());
        } else {
            return redirect('/welcome');
        }
    }

    public function fileExistsChecker($path = null)
    {
        if(!is_null($path)) {
            return ((new Filesystem)->exists($path)) ? true : false ;
        } else {
            return false;
        }
    }

    public function allCompany()
    {
        return app('SystemCompany')->get();
    }

    public function allActiveCompany()
    {
        return app('SystemCompany')->where('status','1')->get();
    }

    public function allInActiveCompany()
    {
        return app('SystemCompany')->where('status','0')->get();
    }

    public function thisModule($module_id) 
    {
        return app('SystemModule')->where('status','1')->where('module_id', $module_id)->first();
    }

    public function thisModuleByCode()
    {
        $moduleCode = strtolower($this->usersActiveModule());

        return app('SystemModule')->where('status','1')->where('module_code', $moduleCode)->first();
    }

    public function allActiveModule()
    {
        return app('SystemModule')->where('status','1')->get();
    }

    public function allActiveModulePerCompany($company)
    {
        $companyModule = $this->getCompanyModuleAccess($company);
        
        return app('SystemModule')->whereIn('module_id', $companyModule)->where('status','1')->get();
    }
    
    public function getParentPath($method = [])
    {
        return (count($method) > 0) ? $method->systemWindow()->first()->menu_path : null ;
    }

    public function dateTimeToday($format)
    {
        $datanow = Carbon::now();

        return $datanow->format($format);
    }

    public function orderLevel($model)
    {
        $collect = $model->select('order_level')->orderBy('order_level','desc')->first();
        
        return (count($collect) > 0) ? $collect['order_level'] + 1 : 1 ;
    }

}
