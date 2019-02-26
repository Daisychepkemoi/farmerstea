<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewAdmin extends Mailable
{
    use Queueable, SerializesModels;
    // public $admin;
    /**
     * Create a new message instance.
     
     * @return void
     */
    public function __construct($admin,$password)
    {
        $this->admin = $admin;
        $this->password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = auth()->user();
        // dd($this->admin);
        $reciever = $this->admin->email;
        $password = $this->password;
        return $this->from($user->email)
                    ->subject('A new admin has been created !!')->to($reciever)->markdown('email.newadmin')
                    ->with([
                    'username' => $this->admin->email,
                    'name' => $this->admin->f_name,
                    'password' => $this->password,
                    'role' => $this->admin->function,
            ]); 
    }
}
