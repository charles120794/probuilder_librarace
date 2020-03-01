<?php 

namespace App\Model\Settings;

use Illuminate\Database\Eloquent\Model;

class systemCompanyDetails extends Model
{
	protected $connection = 'settings';

	protected $table = 'system_company_details';

	protected $primaryKey = 'details_id';

	public $timestamps = false;

	public function hasCompany()
	{
		return $this->belongsTo(systemCompany::class,'company_id','company_id');
	}
}