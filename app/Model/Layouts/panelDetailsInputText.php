<?php

namespace App\Model\Layouts;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Settings\UsersInformationTrait;
use App\Http\Controllers\Common\CommonServiceController as Helper;

class panelDetailsInputText extends Model
{

	use UsersInformationTrait;

    protected $connection = 'penro';

    protected $table = 'panel_details_input_text';

    protected $primaryKey = 'text_id';

    public $timestamps = false;

    protected function save_data($request)
    {
    	$this->text_description = $request->text_name;
    	$this->text_link = $request->text_path;
    	$this->text_tab = $request->text_tab;
    	$this->created_by = $this->thisUser()->id;
    	$this->created_date = (new Helper)->dateTimeToday('Y-m-d h:i:s');
    	$this->save();
    }

    public function add_input_text($request)
    {
    	$this->save_data($request);
    	return $this->text_id;
    }
}