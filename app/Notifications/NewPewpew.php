<?php

namespace App\Notifications;

use App\Models\Pewpew;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Str;

class NewPewpew extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct(public Pewpew $pewpew)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->subject("New Pewpew from {$this->pewpew->user->name}")
            ->greeting("New Pewpew from {$this->pewpew->user->name}")
            ->line(Str::limit($this->pewpew->message, 50))
            ->action('Go to Pewpewer', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
