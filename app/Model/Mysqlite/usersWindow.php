<?php

namespace App\Model\Mysqlite;

use Illuminate\Database\Eloquent\Model;

class usersWindow extends Model
{
    
    protected $connection = 'sqlite';

    protected $table = 'users_window';

    protected $primaryKey = 'window_id';

    public $timestamps = false;

}