<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewUser extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $user = auth()->user();
        return (new MailMessage)
                    ->line('Hi admin, farmer '.$user->f_name.' has just created an account. Please verifiy and ')
                    ->action('allocate Tea Number', url('/admin/upgradefarmer'))
                    ->line('Thank you !');

        //             $proposal = Proposal::where('id',request('id'))->first();
        // $user = User::where('email',$proposal->submitted_by)->first();
        // $username = $user->name;
        // $stage = $proposal->stage;
        // $url = ('/userproposal/'.$proposal->id);
        // return (new MailMessage)
        //             ->line('Hi  '.$username.'  Your Proposal has been '.$stage.'. Please click the link below to check it.')
        //             ->action('Check Proposal', url($url))
        //             ->line('Thank you for giving us Your Proposal to review!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
