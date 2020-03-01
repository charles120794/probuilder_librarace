<?php

namespace App\Model\Layouts;

use Illuminate\Database\Eloquent\Model;
use App\Http\Traits\Settings\UploaderTrait;
use App\Http\Traits\Settings\UsersInformationTrait;
use App\Http\Controllers\Common\CommonServiceController as Helper;

class panelDetailsFrameset extends Model
{
	use UsersInformationTrait,UploaderTrait;

    protected $connection = 'penro';

    protected $table = 'panel_details_frameset';

    protected $primaryKey = 'frame_id';

    public $timestamps = false;

    public function add_frameset($request)
    {
        $this->save_data($request); 
        return $this->frame_id;
    }
    
    public function save_data($request)
    {
		$this->frame_tab = $request->frame_tab;
		$this->frame_name = $request->frame_name;
		$this->frame_path = $request->frame_path;
		$this->created_by = $this->thisUser()->id;
		$this->created_date = (new Helper)->dateTimeToday('Y-m-d h:i:s');
		$this->frame_thumbnail = $this->profileUpload($request,'frame_thumbnail');
        $this->save();
    }
    
}