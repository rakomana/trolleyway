<?php

namespace App\Notifications\User;

use App\Models\Campaign;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Message extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * @var $message
    */
    public $campaign;

    /**
     * Create a new notification instance.
     * @param Campaign $campaign
     *
     * @return void
     */
    public function __construct(Campaign $campaign)
    {
        $this->campaign = $campaign;
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
        return (new MailMessage)
            ->subject("Competition")
            ->greeting("Hi {$notifiable->name} ,")
            ->line("{$this->campaign->message}, ")
            ->action('Competitions', url('https://trolleyway.co.za/'))
            ->action('Unsubscribe', url('https://trolleyway.co.za/unsubscribe'));
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
