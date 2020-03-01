<?php

namespace App\Http\Controllers\Settings;

use Crypt;
use Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SystemCompanyController extends Controller 
{

	protected $company;

	public function __construct()
	{

	}

	public function allCompany()
	{
		$this->company = app('SystemCompany')->get();

		return $this;
	}

	public function byUserPosition()
	{
		$this->company = ($this->thisUser()->position == 3) ? $this->thisUser()->hasCompany()->get() : app('SystemCompany')->get() ;

		return $this;
	}

	public function data()
	{
		return $this->company;
	}
}
