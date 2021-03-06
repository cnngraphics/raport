<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\Request;
use Auth;
use App\Rapport;


class rapportSubmitted extends Mailable
{
    use Queueable, SerializesModels;

    public $user;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->user = Auth::user();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $name = $this->user->name;
        

        return $this->from('cnngraphics@gmail.com', 'Theophile M')
                    ->subject("User $name Submitted a Rapport")
                    ->view('mail.email')
                    ->to('cnngraphics@gmail.com', 'Tester')
                    ;
    }
    
}