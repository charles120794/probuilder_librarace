<?php

namespace App\Model\Relation;

use App\User;
use App\Model\Settings\systemWindowMethod;

use Illuminate\Database\Eloquent\Model;

class usersWindowMethodAccess extends Model
{
    protected $connection = 'settings';

    protected $table = 'users_window_method';

    protected $primaryKey = 'users_id';

    public $timestamps = false;

    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function systemWindowMethod()
    {
        return $this->hasOne(systemWindowMethod::class, 'method_id', 'method_id');
    }
}