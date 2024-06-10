<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class UpdateParcelNotify extends Notification
{
    use Queueable;
    private $Updatenotify;
    /**
     * Create a new notification instance.
     */
    public function __construct($Updatenotify)
    {
        $this->Updatenotify = $Updatenotify;
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
        $updatedData = $this->Updatenotify['Updatedata']; // Store the updated data in a variable
        return (new MailMessage)
                    ->greeting($this->Updatenotify['greeting'])
                    ->line($updatedData) // Use the variable here
                    ->action($this->Updatenotify['notifyText'],$this->Updatenotify['url'])
                    ->line($this->Updatenotify['thankyou']);
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            $this->Updatenotify['Updatedata'],
        ];
    }
}
