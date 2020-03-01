<?php

namespace App\Model\Layouts;

use Illuminate\Database\Eloquent\Model;

use App\Http\Traits\Settings\UploaderTrait;
use App\Http\Traits\Settings\UsersInformationTrait;
use App\Http\Controllers\Common\CommonServiceController as Helper;

class panelDetailsStorage extends Model
{

	use UploaderTrait,UsersInformationTrait;

    protected $connection = 'penro';

    protected $table = 'panel_details_storage';

    protected $primaryKey = 'storage_id';

    public $timestamps = false;

    public function add_storage($request)
    {
    	$this->file_tab = $request->file_tab;
    	$this->file_type = $request->file_type;
    	$this->file_name = $request->file_name;
    	$this->file_link = $request->file_link;
        $this->closing_date = $request->close_date;
        $this->bid_result = $request->bid_result;
    	$this->created_by = $this->thisUser()->id;
    	$this->created_date = (new Helper)->dateTimeToday('Y-m-d h:i:s');
    	$this->file_path = $this->profileUpload($request,'file_path');
    	$this->save();
    	return $this->storage_id;
    }

    public function order_level()
    {
        return $this->select('order_level')->orderBy($this->primaryKey,'desc')->orderBy('created_date','desc')->first();
    }
}