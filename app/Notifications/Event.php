<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use JetBrains\PhpStorm\ArrayShape;

class Event extends Notification
{
    use Queueable;

    public mixed $event;
    /**
     * Create a new notification instance.
     */
    public function __construct($event)
    {
        $this->event = $event;
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
            ->markdown(
                'mail.event.Event',
                    [
                        'event' => $this->event,
                        'user' => $notifiable
                    ]
            )->subject(
                'Your event has been registered'
            );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    #[ArrayShape([
            'name'          => "mixed",
            'message'       =>  "",
            'created_at'    =>  ""
        ])
    ]
    public function toArray(object $notifiable): array
    {
        return [
            'message'       =>  'Dear '.$notifiable->name . ' You have registered an event and it is waiting for confirmation | '.$this->event->created_at->format('Y-M-D'),
        ];
    }
}
