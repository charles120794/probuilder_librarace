<?php

namespace App\Model\Settings;

use App\Model\Relation\usersWindowAccess;

use Illuminate\Database\Eloquent\Model;

class systemWindow extends Model
{
    protected $connection = 'settings';

    protected $table = 'system_window';

    protected $primaryKey = 'menu_id';

    public $timestamps = false;

    public function subClass()
    {
        return $this->hasMany(systemWindow::class, 'menu_parent', 'menu_id')->with('parentClass');
    }
     
    public function subClassMethod()
    {
        return $this->hasMany(systemWindowMethod::class, 'menu_id', 'menu_id');
    }

    public function parentClass()
    {
        return $this->belongsTo(systemWindow::class, 'menu_parent', 'menu_id');
    }

    public function activeWindow($module_id = null)
    {
        
        $query = $this->where('menu_status','1')->orderBy('menu_parent','asc')->orderBy('menu_level','asc')->orderBy('order_level','asc');

        if(!is_null($module_id))
        {
            $query = $query->where('module_id', $module_id);
        }

        if(!is_null(request()->filterModule))
        {
            $query = $query->where('menu_link',request()->filterModule);
        }

        if(!is_null(request()->filterLevel))
        {
            $query = $query->where('menu_level',request()->filterLevel);
        }

        if(!is_null(request()->filterClass))
        {
            $query = $query->where('menu_parent',request()->filterClass);
        }

        if(!is_null(request()->filterIcon))
        {
            $query = $query->where('menu_icon','LIKE',request()->filterIcon.'%');
        }

        if(!is_null(request()->filterDescription))
        {
            $query = $query->where('menu_name','LIKE',request()->filterDescription.'%');
        }

        if(!is_null(request()->filterPath))
        {
            $query = $query->where('menu_path','LIKE',request()->filterPath.'%');
        }

        return $query;
    }

    public function usersAccess()
    {
        return $this->hasOne(usersWindowAccess::class,'menu_id', 'menu_id');
    }

    public function moduleCode()
    {
        return $this->belongsTo(systemModule::class, 'menu_link', 'module_code');
    }

    public function orderLevel()
    {
        $collect = $this->select('order_level')->orderBy('order_level','desc')->first();
        
        return (count($collect) > 0) ? $collect['order_level'] + 1 : 1 ;
    }

}
