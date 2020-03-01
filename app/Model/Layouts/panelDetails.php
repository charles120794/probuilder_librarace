<?php

namespace App\Model\Layouts;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Common\CommonServiceController as Helper;
use App\Http\Traits\Settings\UsersInformationTrait;

class panelDetails extends Model
{
    use UsersInformationTrait;

    protected $connection = 'penro';

    protected $table = 'panel_details';

    protected $primaryKey = 'panel_dtl_id';

    public $timestamps = false;

    public function detail_type()
    {
        return $this->hasOne(panelDetailsType::class,'type_id','panel_dtl_type');
    }

    public function storage()
    {
        return $this->hasOne(panelDetailsStorage::class, 'storage_id', 'panel_dtl_parent_obj')->where(
            function($query){
                if( request()->has('ftype'))
                {
                    $query->where('file_type', request()->ftype);
                }

                if( request()->has('fstatus'))
                {
                    $query->where('status', request()->fstatus);
                }

                if( request()->has('fsearch'))
                {
                    $query->where('file_name','like', '%'.request()->fsearch.'%');
                    $query->orwhere('file_link','like', '%'.request()->fsearch.'%');
                }
                return $query;
            }
        );
    }

    public function frameset()
    {
        return $this->hasOne(panelDetailsFrameset::class, 'frame_id', 'panel_dtl_parent_obj')->where(
            function($query){
                if( request()->has('frstatus'))
                {
                    $query->where('status', request()->frstatus);
                }
                if( request()->has('frsearch'))
                {
                    $query->where('frame_name','like', '%'.request()->frsearch.'%');
                    $query->orwhere('frame_path','like', '%'.request()->frsearch.'%');
                }
                return $query;
            }
        );
    }

    public function longtext()
    {
        return $this->hasOne(panelDetailsLongText::class, 'text_id', 'panel_dtl_parent_obj')->where(
            function($query){
                if( request()->has('flttatus'))
                {
                    $query->where('status', request()->flttatus);
                }
                if( request()->has('fltsearch'))
                {
                    $query->where('long_description','like', '%'.request()->fltsearch.'%');
                    $query->orwhere('long_text','like', '%'.request()->fltsearch.'%');
                }
                return $query;
            }
        );
    }

    public function inputtext()
    {
        return $this->hasOne(panelDetailsInputText::class, 'text_id', 'panel_dtl_parent_obj')->where(
            function($query){
                if( request()->has('fitstatus'))
                {
                    $query->where('status', request()->fitstatus);
                }
                if( request()->has('fitsearch'))
                {
                    $query->where('text_description','like', '%'.request()->fitsearch.'%');
                }
                return $query;
            }
        )->orderBy('text_id','desc')->orderBy('created_date','desc');
    }

    public function add_panel_details($detaidTypeId, $panelId, $lastId)
    {
        $this->panel_dtl_type = $detaidTypeId;
        $this->panel_dtl_parent_id = $panelId;
        $this->panel_dtl_parent_obj = $lastId;
        $this->created_by = $this->thisUser()->id;
        $this->created_date = (new Helper)->dateTimeToday('Y-m-d h:i:s');
        $this->save();
    }
  
}
