<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Setting;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;
    public $request;
    public $emails;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($request)
    {
        $this->request = $request;
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
        return $this->from($this->request->email)->to($this->emails)->markdown('emails.contactform');
    }
}
