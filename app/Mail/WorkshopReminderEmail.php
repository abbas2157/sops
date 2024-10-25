<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class WorkshopReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $user;
    public $workshop;
    public function __construct($user, $workshop)
    {
        $this->user = $user;
        $this->workshop = $workshop;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
<<<<<<< HEAD
            subject: 'Reminder Email for '.$this->workshop->type.' Workshop',
=======
            subject: 'Reminder Email for '.$this->workshop->title.' Workshop',
>>>>>>> 3acb4d94be3e2ee7da0edcbc85577beee00a3708
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'mails.workshop-reminder',
            with: [
                'user' => $this->user,
                'workshop' => $this->workshop
            ]
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
