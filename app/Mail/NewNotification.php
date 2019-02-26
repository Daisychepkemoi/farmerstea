<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class NewNotification extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($notification)
    {
        $this->notification = $notification;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $users = User::where('role', 'user')->where('verifiedadmin', 'verified')->pluck('email')->toArray();
        // $recipients = explode(',',$users);
        $useremail = User::where('id', $this->notification->user_id)->pluck('email')->toArray();
        return $this->from($useremail)
                    ->subject($this->notification->title)->to($users)->markdown('email.newnotification')->with([
                'message' => $this->notification->body,
                'sender' => $useremail,
                'subject' => $this->notification->title,
            ]);
    }
}
