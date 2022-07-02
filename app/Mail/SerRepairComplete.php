<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SerRepairComplete extends Mailable
{
    use Queueable, SerializesModels;

    public $servicerepair;

    public function __construct($servicerepair)
    {
        $this->servicerepair = $servicerepair;
    }

    public function build()
    {      
        return $this->subject('Your Job Complete')
                    ->view('admin.emails.servicerepairComplete');
    }
}
