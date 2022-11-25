<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\Visitor;

class ForgotPassword extends Mailable
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
        $visitor = Visitor::where('email', request('email'))->first();
        return $this->from('support@budi.ansol.id')
        ->view('forgotpasswordemail')
        ->with(
            [
                'name' => $visitor->name,
                'token' => $visitor->token,
            ]);

    }
}
