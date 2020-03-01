<?php

namespace App\Model\Relation;

use App\User;
use App\Model\Settings\systemCompany;
use Illuminate\Database\Eloquent\Model;

class usersCompanyAccess extends Model
{
    protected $connection = 'settings';

    protected $table = 'users_company';

    protected $primaryKey = 'users_id';

    public $timestamps = false;

    public function hasUser()
    {
        return $this->hasOne(User::class, 'id', 'users_id');
    }

    public function hasCompany()
    {
        return $this->hasOne(systemCompany::class, 'company_id', 'company_id');
    }
}