<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Tea;

class VerifyFarmer extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($farmer)
    {
        $this->farmer = $farmer;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $user = auth()->user();
        $teano = Tea::where('user_id',$this->farmer->id)->first();
        $farmeremail = $this->farmer->email;
        return $this->from($user->email)
                    ->subject('Your tea number application  has been reviewed ')
                    ->to($farmeremail)
                    ->markdown('email.verifyfarmer')
                    ->with([
                    'farmername' => $this->farmer->f_name,
                    'teano' => $teano->tea_no,
                    'function' => $this->farmer->verifiedadmin,
            ]); 
        // return $this->/view('view.name');
    }
}
