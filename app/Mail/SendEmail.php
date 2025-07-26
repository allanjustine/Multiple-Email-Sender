<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Mail\Mailables\Attachment;

class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct(
        public $content,
        public $subject,
        public $from_email,
        public $from_name,
        public $reply_to_email,
        public $reply_to_name,
        public $send_to,
        public $files
    ) {
        $this->content = $content;
        $this->subject = $subject;
        $this->from_email = $from_email;
        $this->from_name = $from_name;
        $this->reply_to_email = $reply_to_email;
        $this->reply_to_name = $reply_to_name;
        $this->send_to = $send_to;
        $this->files = $files;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: $this->subject,
            from: new Address($this->from_email, $this->from_name),
            replyTo: [new Address($this->reply_to_email, $this->reply_to_name)],
            to: $this->send_to
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $year = now()->format('Y');
        return new Content(
            view: 'mail.send-email',
            with: [
                'content'           => $this->content,
                'from_email'        => $this->from_email,
                'from_name'         => $this->from_name,
                'year'              => $year
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
        $datas = [];

        foreach ($this->files as $attachment) {
            $datas[] = Attachment::fromStorageDisk('public', $attachment);
        }

        return $datas;
    }
}
