<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RevokeAdmin extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($admin)
    {
        $this->admin = $admin;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = auth()->user();
        $reciever = $this->admin->email;
        if($this->admin->role == 'user'){
           return $this->from($user->email)
                    ->subject('Your Account Has been deactivated !!')->to($this->admin->email)->markdown('email.revoke')
                    ->with([
                    'username' => $this->admin->f_name,
                    
            ]);  
        }
        else{
            return $this->from($user->email)
                    ->subject('Your Account Has been Reactivated !!')->to($this->admin->email)->markdown('email.readdadmin')
                    ->with([
                    'username' => $this->admin->f_name,
                    
            ]); 
        }
        
    }
}
