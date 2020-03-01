<?php

namespace App\Model\Librarace;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BooksCategory extends Model
{
    protected $connection = 'librarace';

    protected $table = 'books_category';

    protected $primaryKey = 'category_id';

    public $timestamps = false;

    public function booksInfo(){
    	return $this->hasMany(Books::class,'category_id','category_id');
    }

    public function locationInfo(){
        return $this->belongsTo(BooksLocation::class,'location_id','location_id');
    }

    public function creatorInfo() {
    	return $this->hasOne(User::class,'id','created_by');
    }

    public function booksQuantity()
    {
        return $this->hasMany(Books::class,'category_id','category_id')->select('book_id');
    }
}