<?php

namespace App\Notifications\Seller\Shop;

use App\Models\Shop;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotifySeller extends Notification
{
    use Queueable;

    /**
     * @var Shop shop
     * @var string $password
    */
    public $shop;
    public $password;

    /**
     * Inject models into the constructor
     * @param Shop $shop
     * @param string $password
    */
    public function __construct(string $password, Shop $shop)
    {
        $this->password = $password;
        $this->shop = $shop;
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
            ->subject("Welcome to {$this->shop->name}")
            ->greeting("Dear {$notifiable->name} ,")
            ->line("You have been added to {$this->shop->name} ")
            ->line("Use this as your password: {$this->password}")
            ->action('Sign In', url('https://trolleyway.co.za/seller/login'))
            ->line('We would like to have you onboard!');
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
