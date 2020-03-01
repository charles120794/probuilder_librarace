<?php

namespace App\Mail\Librarace;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendReservationRequest extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $message;

    public function __construct($message = '')
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
        return $this->from($this->setFromAddress())->subject('Librarace New Book Request')
            ->markdown('emails.sendEmailToAdmin')->with([
                'message' => 'You have new requested book from student no. 1111',
            ]);
    }

    public function setFromAddress()
    {   
        return 'wongcharlesdave@datsmotopro.com';
    }
}
