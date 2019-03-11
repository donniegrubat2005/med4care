<?php


namespace App\Mail\Backend\Contact;

use Illuminate\Http\Request;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;


class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $data;

    public function __construct($data = array())
    {
        $this->data = (object)$data;

    }

    public function build()
    {
        return $this->to($this->data->email, $this->data->name)
            ->view('backend.mail.content.' . 'mail-register')
            ->text('backend.mail.contact-text')
            ->subject($this->data->subject)
            ->from(config('mail.from.address'), config('mail.from.name'))
            ->replyTo(config('mail.from.address'), config('mail.from.name'));
    }
}
