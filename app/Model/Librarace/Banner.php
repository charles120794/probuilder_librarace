<?php

namespace App\Model\Librarace;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $connection = 'librarace';

    protected $table = 'banner';

    protected $primaryKey = 'banner_id';

    public $timestamps = false;

}