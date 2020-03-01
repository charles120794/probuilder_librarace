<?php

namespace App\Model\Librarace;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UsersData extends Model
{
    protected $connection = 'librarace';

    protected $table = 'users_data';

    protected $primaryKey = 'user_id';

    public $timestamps = false;

    protected $hidden = [
        'password',
    ];
 
    public function borrowInfo() {
    	return $this->hasMany(Borrow::class,'user_id','user_id');
    }

    public function creatorInfo() {
        return $this->hasOne(User::class,'id','created_by');
    }
}