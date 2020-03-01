<?php 

namespace App\Model\Settings;

use App\User;
use App\Model\Relation\systemCompanyModule;

use Illuminate\Database\Eloquent\Model;

class systemCompany extends Model
{
		
	protected $connection = 'settings';

	protected $table = 'system_company';

	protected $primaryKey = 'company_id';

	public $timestamps = false;

	public function users()
	{
		return $this->hasMany(User::class,'company_id','company_id');
	}

	public function updatedBy()
	{
		return $this->signaTory('updated_by');
	}

	public function createdBy()
	{
		return $this->signaTory('created_by');
	}

	public function signaTory($column)
	{
		$exists = $this->hasOne(User::class,'id', $column)->first();

		return (count($exists) > 0) ? $exists->firstname : '' ;
	}

	public function companyDetails()
	{
		return $this->hasMany(systemCompanyDetails::class,'company_id','company_id');
	}

	/* RELATION TABLE */
	public function modulesAccess()
	{
		return $this->hasMany(systemCompanyModule::class,'company_id','company_id');
	}

	public function companyModules()
	{
		return $this->hasMany(systemCompanyModule::class,'company_id','company_id')->with('belongsToModule');
	}

}