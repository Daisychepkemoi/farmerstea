<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ReplyContact extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($title,$body,$email)
    {
        $this->title = $title;
        $this->body = $body;
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user =auth()->user();
        // dd($this->title);
         return $this->from($user->email)
                    ->subject($this->title)->to($this->email)->markdown('email.replycontact')->with([
                'message' => $this->body,
                
            ]); 
    }
}
