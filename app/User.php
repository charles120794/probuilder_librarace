<?php

namespace App;

use App\Model\Settings\systemCompany;

use App\Model\Relation\usersCompanyAccess;
use App\Model\Relation\usersModuleAccess;
use App\Model\Relation\usersWindowAccess;
use App\Model\Relation\usersWindowMethodAccess;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $connection = 'settings';

    protected $table = 'users';
   
    protected $hidden = [
        'password', 'remember_token',
    ];

    public $timestamps = false;

    public function hasCompany()
    {
        return $this->belongsTo(systemCompany::class,'company_id','company_id');
    }

    public function companyAccess()
    {
        return $this->hasMany(usersCompanyAccess::class,'users_id','id');
    }

    public function moduleAccess()
    {
        return $this->hasMany(usersModuleAccess::class,'users_id','id');
    }

    public function windowAccess()
    {
    	return $this->hasMany(usersWindowAccess::class,'users_id','id');
    }

    public function windowMethodAccess()
    {
        return $this->hasMany(usersWindowMethodAccess::class,'users_id','id');
    }
    
}
