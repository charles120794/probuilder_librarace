<?php

namespace App\Model\Layouts;

use Illuminate\Database\Eloquent\Model;

class panelDetailsType extends Model
{
    protected $connection = 'penro';

    protected $table = 'panel_details_type';

    protected $primaryKey = 'type_id';

    public $timestamps = false;
}