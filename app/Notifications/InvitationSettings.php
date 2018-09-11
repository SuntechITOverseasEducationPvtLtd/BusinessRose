<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class InvitationSettings extends Notification
{
    use Queueable;
    private $email_templates;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($email_templates)
    {
        $this->email_templates = $email_templates;
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
    {   //create and send forgot password token here
		//$url = url('/live/spa/forgot-password/'.$notifiable->token);
        $status = ($notifiable->flag==1)?'Activated':'Unsubscribed';
		return (new MailMessage)
			->subject($notifiable->subject)
			->line('Invitation Settings hasbeen '.$status)
			->line('Thank you for using BusinessRose!');
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
