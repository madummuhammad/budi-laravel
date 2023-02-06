<?php

namespace App\Mail;

use App\Models\Visitor;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerificationEmail extends Mailable
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
        $visitor = Visitor::where('username', request('username'))->where('email',request('pos-el'))->first();
        return $this->from('support@budi.ansol.id')
            ->view('verification')
            ->with(
                [
                    'nama' => $visitor->name,
                    'token' => $visitor->token,
                ]);

    }
}