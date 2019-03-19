<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\User;

class ContactForm extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($contactus)
    {
        $this->contactus = $contactus;  
     }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // $recipients = explode(',',$users);
        $users =User::where('role','admin')->where('created_by','user')->pluck('email')->toArray();
        // dd($users->f_name);
        return $this->from($this->contactus->email)
                    ->subject($this->contactus->title)->to($users)->markdown('email.contactus')
                    ->with([
                    'body' => $this->contactus->body,
            ]); 
    }
}
