<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\ServiceRepair;

class SerRepair extends Mailable
{
    use Queueable, SerializesModels;

    public $servicerepair;

    public function __construct($servicerepair)
    {
        $this->servicerepair = $servicerepair;
    }

    public function build()
    {      
        return $this->subject('Your Job Start')
                    ->view('admin.emails.servicerepair');
    }
}
