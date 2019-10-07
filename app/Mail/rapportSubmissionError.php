<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class rapportSubmissionError extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cnngraphics@gmail.com', 'Theophile M')
                    ->subject("Error Submitting Rapport")
                    ->to('cnngraphics@gmail.com', 'Tester')
                    ->view('mail.rapport-submission-error');
    }
}
