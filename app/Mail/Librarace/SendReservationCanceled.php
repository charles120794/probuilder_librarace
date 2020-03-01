<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReservationCanceled extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message;

    public function __construct($message)
    {
        return $this->message = $message;
    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build()
    {
        return $this->from($this->setFromAddress())->subject('Laravel Notification Email')
            ->markdown('emails.sendEmailToAdmin')->with([
                'message' => $this->message,
            ]);;
    }

    public function setFromAddress()
    {   
        return config('mail.from');
        // [
        //     'address' => Auth::User()->email,
        //     'name' => Auth::User()->name
        // ];
    }
}
