<?php

namespace App\Model\Relation;

use App\User;
use App\Model\Settings\systemModule;
use Illuminate\Database\Eloquent\Model;

class usersModuleAccess extends Model
{
    protected $connection = 'settings';

    protected $table = 'users_module';

    protected $primaryKey = 'users_id';

    public $timestamps = false;

    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function hasModule()
    {
        return $this->hasOne(systemModule::class, 'module_id', 'module_id');
    }
}
