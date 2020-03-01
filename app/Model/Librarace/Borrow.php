<?php

namespace App\Model\Librarace;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Borrow extends Model
{
    protected $connection = 'librarace';

    protected $table = 'borrow';

    protected $primaryKey = 'borrow_id';

    public $timestamps = false;

    public function usersInfo() {
    	return $this->hasOne(UsersData::class,'user_id','user_id');
    }
    // FOR 1 IS TO 1
    public function borrowInfo() {
    	return $this->hasOne(BorrowDetails::class,'borrow_id','borrow_id');
    }
    // FOR 1 TO MANY BORROWED BOOKS
    public function borrowDetailsInfo() {
        return $this->hasMany(BorrowDetails::class,'borrow_id','borrow_id');
    }

    public function booksRequestQty() {
        return $this->hasMany(BorrowDetails::class,'borrow_id','borrow_id');
    }

    public function booksIssuedQty() {
        return $this->hasMany(BorrowDetails::class,'borrow_id','borrow_id')->where('status','IS');
    }

    public function booksReturnedQty() {
        return $this->hasMany(BorrowDetails::class,'borrow_id','borrow_id')->where('status','RE');
    }

    public function approverInfo() {
        return $this->hasOne(User::class,'id','approved_by');
    }

    public function cancellerInfo() {
        return $this->hasOne(User::class,'id','cancelled_by');
    }

    public function creatorInfo() {
        return $this->hasOne(User::class,'id','created_by');
    }
}