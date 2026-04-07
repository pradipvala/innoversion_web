<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;



class ContactFormMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Contact Mail',
        );
    }
    




    /**
     * Get the message content definition.
     */
        // public function content(): Content
        // {
        //     return new Content(
        //           //view: 'view.name',
        //         view: emails.contact-form,
                
        //     );
        // }
        public function content()
        {
            return new Content(
                view: 'emails.contact-form',
            );
        }




        public function build()
        {   
        
            return $this->view('emails.contact-form')
                        // ->with(['details' => $this->details])
                         ->with(['name' => $this->to[0]['name']])
                        ->with(['address' => $this->to[0]['address']])
                        ->subject('New Contact Form Submission');
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
