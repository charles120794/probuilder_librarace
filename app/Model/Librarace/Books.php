<?php

namespace App\Model\Librarace;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    protected $connection = 'librarace';

    protected $table = 'books';

    protected $primaryKey = 'book_id';

    public $timestamps = false;

    public function categoryInfo(){
    	return $this->belongsTo(BooksCategory::class,'category_id','category_id');
    }
    // STATUS R IS ALREADY RETURNED
    public function borrowDetailsInfo(){
    	return $this->hasOne(BorrowDetails::class,'book_id','book_id')->orderBy('date_to','desc')->limit(1);
    }
}