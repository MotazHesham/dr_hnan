<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PriceOrder extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public  $fname;
    public  $umail;
    public  $email;
    public  $manager;
    public  $phone;
     public  $service;
    public function __construct($order)
    {
        $this->fname=$order['fname'];
        $this->umail=$order['umail'];
        $this->manager=$order['manager'];
        $this->phone=$order['phone'];
        $this->email=$order['email'];
        $this->service=$order['service'];
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'طلب عرض سعر
',
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
            view: 'emails.priceOrder',
            with:[
                'fname'=>$this->fname,
                'umail'=>$this->umail,
                'manager'=>$this->manager,
                'phone'=>$this->phone,
                'email'=>$this->email,
                'service'=>$this->service,



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
