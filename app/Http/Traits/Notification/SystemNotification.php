<?php

namespace App\Http\Traits\Notification;

use Mail;
use Illuminate\Http\Request;
use App\Mail\NotifyAdmin;

trait SystemNotification
{
    public function notifyAdmin()
    {
        $toAdmin = config('mail.to');
    
        $Message = request()->ip() . ' is accessing your website www.datsmotopro.com';
    
        Mail::to($toAdmin)->send(new NotifyAdmin($Message));
    }
}