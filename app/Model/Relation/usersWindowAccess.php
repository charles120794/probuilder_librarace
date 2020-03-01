<?php

namespace App\Model\Relation;

use App\User;
use App\Model\Settings\systemWindow;
use App\Model\Settings\systemModule;
use Illuminate\Database\Eloquent\Model;

class usersWindowAccess extends Model
{
    protected $connection = 'settings';

    protected $table = 'users_window';

    protected $primaryKey = 'users_id';

    public $timestamps = false;

    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function systemSubClass()
    {
        return $this->hasMany(usersWindowAccess::class,'menu_parent','menu_id');
    }

    public function systemWindow()
    {
        return $this->hasOne(systemWindow::class, 'menu_id', 'menu_id');
    }

    public function systemModuleTo()
    {
        return $this->hasOne(systemModule::class, 'module_id', 'module_to');
    }

    public function systemModuleFrom()
    {
        return $this->hasOne(systemModule::class, 'module_id', 'module_from');
    }

}
