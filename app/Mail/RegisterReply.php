<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class RegisterReply extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($user)
    {
        
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $admin = User::where('role','admin')->where('created_by','user')->first();
        // dd($this->user->email);
         return $this->from($admin->email)
                    ->subject('Litein Tea Factory Registration Feedback')->to($this->user->email)->markdown('email.registerreply')->with([
                'message' =>'Concern Received' ,
                'username' => $this->user->f_name,
                
            ]); 
    }
}
