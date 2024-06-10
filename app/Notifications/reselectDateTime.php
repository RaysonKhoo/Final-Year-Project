<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class reselectDateTime extends Notification
{
    use Queueable;
    private $reselect;
    /**
     * Create a new notification instance.
     */
    public function __construct($reselect)
    {
        $this->reselect = $reselect;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail','database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->greeting($this->reselect['greeting'])
                    ->line($this->reselect['body'])
                    ->action($this->reselect['reselectText'],$this->reselect['url'])
                    ->line($this->reselect['expirationMessage'])
                    ->line($this->reselect['thankyou']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            $this->reselect['body'],
            $this->reselect['expirationMessage']
        ];
    }
}
