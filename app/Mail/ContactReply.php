<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ContactReply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
   public function __construct($email)
    {
        
        $this->email = $email;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $admin = User::where('role','admin')->where('created_by','user')->first();
         return $this->from($admin->email)
                    ->subject('Litein Tea Factory Feedback')->to($this->email)->markdown('email.contactreply')->with([
                'message' =>'Concern Received' ,
                
            ]); 
    }
}
