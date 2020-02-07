<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Register;
use App\Setting;

class SpaceRegister extends Mailable
{
    use Queueable, SerializesModels;

    public $register;
    public $emails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Register $register)
    {
        $this->register = $register;
        $emails = Setting::ofValue('emails');
        $emails = array_filter(array_map('trim',explode(';', $emails)));
        $this->emails = $emails;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->to($this->emails)
        ->markdown('emails.spaceregister');
    }
}
