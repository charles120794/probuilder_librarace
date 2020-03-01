<?php

namespace App\Model\Relation;

use App\Model\Settings\systemModule;
use App\Model\Settings\systemCompany;

use Illuminate\Database\Eloquent\Model;

class systemCompanyModule extends Model
{
    
    protected $connection = 'settings';

    protected $table = 'system_company_module';

    protected $primaryKey = 'company_id';

    public $timestamps = false;

    public function belongsToModule()
    {
        return $this->belongsTo(systemModule::class, 'module_id', 'module_id');
    }

    public function belongsToCompany()
    {
        return $this->belongsTo(systemCompany::class, 'company_id', 'company_id');
    }

}