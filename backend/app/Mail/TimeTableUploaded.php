<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class TimeTableUploaded extends Mailable
{
    use Queueable, SerializesModels;


    public $classe;
    public $timeTable;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($classe, $timeTable)
    {
        $this->classe = $classe;
        $this->timeTable = $timeTable;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Nouveau Emploi du temps',
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
            view: 'Mails.timeTableUploaded',
            with: [
                'classe' => $this->classe,
                'timeTable' => $this->timeTable
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
        return [
            // 'images/ofppt_logo.png'
        ];
    }
}
