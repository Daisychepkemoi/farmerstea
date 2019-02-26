<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewEvent extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($event)
    {
        $this->event = $event;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $users = User::where('role','user')->where('verifiedadmin','verified')->pluck('email','f_name')->toArray();
                 // $recipients = explode(',',$users);
        $useremail = User::where('id',$this->event->user_id)->pluck('email','f_name')->toArray();
         return $this->from($useremail)
                    ->subject($this->event->title)->to($users)->markdown('email.newevent')->with([
                'message' => $this->event->body,
                'sender' => $useremail,
                'subject' => $this->event->title,
            ]); 
    }
}
