<?php

namespace App\Model\Librarace;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BooksLocation extends Model
{
    protected $connection = 'librarace';

    protected $table = 'books_location';

    protected $primaryKey = 'location_id';

    public $timestamps = false;

    public function categoryInfo(){
    	return $this->hasMany(BooksCategory::class,'location_id','location_id');
    }

    public function creatorInfo() {
    	return $this->hasOne(User::class,'id','created_by');
    }
}