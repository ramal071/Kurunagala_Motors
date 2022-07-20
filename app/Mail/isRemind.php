<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ServiceRepair;

class isRemind extends Mailable
{
    use Queueable, SerializesModels;

    public $servicerepair;

    public function __construct($servicerepair)
    {
        $this->servicerepair = $servicerepair;
    }

    public function build()
    {      
        return $this->subject('Your pending payment details')
                    ->view('admin.emails.customerRemind');
    }
}
