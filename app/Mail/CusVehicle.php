<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\CustomerVehicle;

class CusVehicle extends Mailable
{
    use Queueable, SerializesModels;

    public $customervehicle;

    public function __construct($customervehicle)
{
    $this->customervehicle = $customervehicle;
}

public function build()
{      
    return $this->subject('registered customer vehicle')
                ->view('admin.emails.customervehicle');
}
}
