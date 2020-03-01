<?php

namespace App\Http\Controllers\Website;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;

class PenroWebsiteController extends controller
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

        $checkpath = app('NavHeaderDetails')->where('nav_path', $this->path);

        if ($checkpath->count() > 0 && !is_null($this->action) && !is_null($this->id)) {

            return $this->activemethod($this->action, $this->id, $checkpath->first(), $request);

        } else if ($checkpath->count() > 0 && is_null($this->action)) {

            $blade = $checkpath->first()->nav_blade;

            if(\View::exists($blade)){
                
                return view($blade)
                        ->with('webdata', $this)
                        ->with('panel', $this->getpanelview($checkpath->first()->nav_id));

            } else {

                return $this->error404();

            }

        } else {

            return $this->error404();

        }

    }

    public function activemethod($action, $id, $checkpath, $request)
    {

        $checker = $checkpath->nav_method->where('nav_name', $action);

        if( $checker->count() > 0 ) {

            $method = ($checker->count() > 0) ? $checker->first() : ['nav_function' => ''];
        
            if (method_exists(app($method['nav_traits']), $method['nav_function'])) {

                $function = $method->nav_function;

                return $this->$function($method, $id, $checkpath, $request);

            } else {
                return $this->error404();
            }

        } else {
            return $this->error404();
        }
        
    }

    public function getpanelview($nav_id, $collect = [])
    {

        $panel = app('Panel')->where('panel_nav', $nav_id)->get();

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
