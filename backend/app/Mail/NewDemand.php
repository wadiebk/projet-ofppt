<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class NewDemand extends Mailable
{
    use Queueable, SerializesModels;

    public $type;
    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($type, $user_id)
    {
        $this->type = $type;
        $user = \App\Models\User::find($user_id);
        // echo $user;
        $this->user = $user;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nouveau Demande',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            view: 'Mails.newDemand',
            with: [
                'type' => $this->type,
                'subject' => "Nouveau Demande",
                'user' => $this->user
            ]

        );
    }

    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
