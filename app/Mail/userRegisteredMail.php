<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class userRegisteredMail extends Mailable
{
    use Queueable, SerializesModels;

    //passer a la consctruction les infos du ser et les services connexes pour qu'il puisse 
    //en comnnader depuis son mail
    public $user;
    public $serviceConnexe;

    /**
     * Create a new message instance.
     */
    public function __construct($user, $serviceConnexe )
    {
        //
        $this->user = $user;
        $this->serviceConnexe = $serviceConnexe;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notification d\'inscription',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'pages.back.notifications',
        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
