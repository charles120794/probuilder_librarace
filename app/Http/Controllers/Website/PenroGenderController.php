<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GenderMainController;

class PenroGenderController extends GenderMainController
{ 

    protected $id;

    protected $path;

    protected $action;

    public function __construct()
    {
        $this->id = Route::getCurrentRoute()->parameter('id');

        $this->path = Route::getCurrentRoute()->parameter('path');

        $this->action = Route::getCurrentRoute()->parameter('action');
    }

    public function activenavbar($request)
    {
        
        $detail = app('GenderNavBarDetails')->where('detail_path', $this->path);

        if ($detail->count() > 0 && !is_null($this->action) && !is_null($this->id) ) {

            return $this->activemethod($this->action, $this->id, $detail->first(), $request);

        } else if ($detail->count() > 0 && is_null($this->action) ) {

            $blade = $detail->first()->detail_blade;

            if(\View::exists($blade)) {

                return $this->toIndex($detail->first(), $this->id, $request);

            } else {

                return $this->error404();

            }

        } else {

            return $this->error404();

        }

    }

    public function activemethod($action, $id, $checkpath, $request)
    {

        $method = $checkpath->navBarMethodsInfo->where('method_action', $action)->first();

        if( count($method) > 0 ) {

            if(method_exists(app($method['method_traits']), $method['method_function'] ) ) {

                $function = $method['method_function'];

                return $this->$function($method, $id, $request);

            } else {

                return $this->error404();

            }

        } else {

            return $this->error404();
            
        }
        
    }

    public function getpanelview($nav_id, $collect = [])
    {

        $panel = app('GenderNavBar')->where('panel_nav', $nav_id)->get();

        foreach ($panel as $key => $value) {

            $panel_details = $value->panel_details()->where('status','1')->get();

            $collect[] = array_add($value,'details', $this->checkmodeltoconnect($panel_details));

        }

        return $collect;

    }

    public function checkmodeltoconnect($array, $newArray = [])
    {

        foreach ($array as $key => $value) {

            if ($value->detail_type->type_code == 'STR') {
                array_add($value, 'storage', $value->storage()->get());
            }

            if ($value->detail_type->type_code == 'FRA') {
                array_add($value, 'frameset', $value->frameset()->get());
            }

            if ($value->detail_type->type_code == 'LON') {
                array_add($value, 'longtext', $value->longtext()->get());
            }

            if ($value->detail_type->type_code == 'TEX') {
                array_add($value, 'inputtext', $value->longtext()->get());
            }

        }

        return $array;

    }

    public function error404()
    {
        return view('errors.404');
    }
    
}
