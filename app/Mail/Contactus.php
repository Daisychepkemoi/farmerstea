<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;


class Contactus extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notification,$email)
    {
        $this->notification = $notification;  
        $this->email = $email;  
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
         $users = User::where('role', 'admin')->where('created_by','user')->pluck('email')->toArray();
        // $recipients = explode(',',$users);

        $notification = $this->notification;
        $email = $this->email;
        return $this->from($email)
                    ->subject('Contact Us form Field !!. Titled "'.$this->notification->title.' " Please reply to it')->to($users)->markdown('email.contactus')
                    ->with([
                    'body' => $this->notification->body,
                    'title' => $this->notification->title,
            ]); 
    }
}
