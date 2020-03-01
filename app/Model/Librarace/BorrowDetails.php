<?php

namespace App\Model\Librarace;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BorrowDetails extends Model
{
    protected $connection = 'librarace';

    protected $table = 'borrow_details';

    protected $primaryKey = 'detail_id';

    public $timestamps = false;

    public function borrowInfo(){
    	return $this->belongsTo(Borrow::class,'borrow_id','borrow_id');
    }

    public function bookInfo(){
        return $this->belongsTo(Books::class,'book_id','book_id');
    }

    public function bookAlreadyIssued($id){
        return $this->where('book_id',$id)->where('status','IS')->get();
    }

}