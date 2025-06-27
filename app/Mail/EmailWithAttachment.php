<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EmailWithAttachment extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->subject($this->data['subject'])
            ->view('layouts.email');

        // Lampirkan setiap lampiran
        foreach ($this->data['attachments'] as $attachment) {
            $mail->attach($attachment);
        }

        return $mail;
    }
}
