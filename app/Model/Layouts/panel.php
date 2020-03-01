<?php

namespace App\Model\Layouts;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Settings\UsersInformationTrait;
use App\Http\Controllers\Common\CommonServiceController as Helper;

class panel extends Model
{
	use UsersInformationTrait;
	
    protected $connection = 'penro';

    protected $table = 'panel';

    public $timestamps = false;

    public $primaryKey = 'panel_id';

    public function panel_details()
    {
    	return $this->hasMany(panelDetails::class,'panel_dtl_parent_id','panel_id');
    }

    public function add_new_panel($request)
    {
    	$this->panel_nav = $request->panel_nav;
    	$this->panel_name = $request->panel_name;
    	$this->panel_size = $request->panel_sizes;
    	$this->panel_class = $request->panel_class;
    	$this->font_size = $request->panel_font_size;
    	$this->created_by = $this->thisUser()->id;
    	$this->created_date = (new Helper)->dateTimeToday('Y-m-d h:i:s');
    	$this->save();
    }

}
