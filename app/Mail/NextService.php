<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\customerpendingservice;

class NextService extends Mailable
{
    use Queueable, SerializesModels;

    public $customerpendingservice;

    public function __construct($customerpendingservice)
    {
        $this->customerpendingservice = $customerpendingservice;
    }

    public function build()
    {
           
        return $this->subject('Your pending service details')
                    ->view('admin.emails.nextservice');
      
    }
}
