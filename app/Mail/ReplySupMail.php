<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ReplySupMail extends Mailable
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
        $address = 'nmtran68@gmail.com';
        $subject = 'Phản hồi hỗ trợ khách hàng';
        $name = 'TIMIHOST';
        
        return $this->view('FE.emails.reply-support')
                    ->from($address, $name)
                    // can thi bo them vao:
                    ->cc($address, $name)
                    // ->bcc($address, $name)
                    ->replyTo('nmtran68@gmail.com', 'TIMIHOST')
                    ->subject($subject)
                    ->with([$this->data]);
                    // 'products' => $this->data['products'],
    }
}
