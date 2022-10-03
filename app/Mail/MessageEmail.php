<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MessageEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $email = request('email');
        $name = request('name');
        $pesan = request('pesan');
        return $this->from('support@budi.ansol.id')
            ->subject('Pesan Dari ' . request('name'))
            ->view('message')
            ->with(
                [
                    'name' => $name,
                    'email' => $email,
                    'pesan' => $pesan,
                ]);

    }
}