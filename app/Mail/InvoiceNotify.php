<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class InvoiceNotify extends Mailable
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
        $subject = 'Hóa đơn thanh toán';
        $name = 'TIMIHOST';
        
        return $this->view('FE.emails.invoice')
                    ->from($address, $name)
                    // can thi bo them vao:
                    ->cc($address, $name)
                    // ->bcc($address, $name)
                    ->replyTo('nmtran68@gmail.com', 'TIMIHOST')
                    ->subject($subject)
                    ->with([ 'name' => $this->data['name'],
                    'now' => $this->data['now'],
                    'times' => $this->data['times'],
                    'how_to_pay' => $this->data['how_to_pay'],
                     'invoice_payment' => $this->data['invoice_payment'],
                     'id_invoice' => $this->data['id_invoice'],
                      'body' => $this->data['body']]);
                    // 'products' => $this->data['products'],
    }
}
