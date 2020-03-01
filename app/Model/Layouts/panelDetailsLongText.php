<?php

namespace App\Model\Layouts;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Common\CommonServiceController as Helper;
use App\Http\Traits\Settings\UsersInformationTrait;

class panelDetailsLongText extends Model
{

	use UsersInformationTrait;

    protected $connection = 'penro';

    protected $table = 'panel_details_long_text';

    protected $primaryKey = 'text_id';

    public $timestamps = false;

    protected function save_data($request)
    {
    	$this->long_description = $request->long_description;
    	$this->long_text = $request->long_text;
    	$this->created_by = $this->thisUser()->id;
    	$this->created_date = (new Helper)->dateTimeToday('Y-m-d h:i:s');
    	$this->save();
    }

    public function add_long_text($request)
    {
    	$this->save_data($request);
    	return $this->text_id;
    }
}