<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Order;

class NewOrder extends Mailable
{
    use Queueable, SerializesModels;

    protected Order $order;
    public $sender_name;
    public $sender_surname;
    public $mail;
    public $phone;
    public $address;
    public $note;

    /**
     * Create a new message instance.
     */
    public function __construct($order, $sender_name, $sender_surname, $mail, $phone, $address, $note)
    {
        $this->order = $order;
        $this->sender_name = $sender_name;
        $this->sender_surname = $sender_surname;
        $this->mail = $mail;
        $this->phone = $phone;
        $this->address = $address;
        $this->note = $note;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

            from: $this->sender_name . $this->sender_surname,
            subject: 'Nuovo ordine',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        $order = $this->order;

        return new Content(
            markdown: 'mails.orders.status',
            with: [
                'sender_name' => $this->sender_name,
                'sender_surname' => $this->sender_surname,
                'mail' => $this->mail,
                'phone' => $this->phone,
                'address' => $this->address,
                'note' => $this->note,
                'order' => $this->order,
                'text' => $this->$this->order->status ? 'L\'ordine è andato a buon fine' : 'L\'ordine è stato respinto'
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
