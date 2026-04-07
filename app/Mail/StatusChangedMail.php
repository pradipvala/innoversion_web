<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue; //


class StatusChangedMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $status;

    public function __construct($status)
    {
        $this->status = $status;
    }

    public function build()
    {
        return $this->view('emails.status_changed')
                    ->with(['status' => $this->status]);
    }
}
