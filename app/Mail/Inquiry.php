<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Setting;

class Inquiry extends Mailable
{
    use Queueable, SerializesModels;
    public $data;
    public $emails;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
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
        return $this->markdown('emails.inquiry')
            ->to($this->emails);

    }
}
