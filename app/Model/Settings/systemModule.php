<?php

namespace App\Model\Settings;

use App\Model\Relation\usersModuleAccess;

use Illuminate\Database\Eloquent\Model;

class systemModule extends Model
{
    protected $connection = 'settings';

    protected $table = 'system_module';

    protected $primaryKey = 'module_id';

    public $timestamps = false;

    public function hasModuleAccess()
    {
        return $this->hasMany(usersModuleAccess::class, 'module_id', 'module_id');
    }

}
