<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\Requests;
use App\Models\User;
use Illuminate\Notifications\Notification;

class requestnoti extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $previousRequests;

    public function __construct($previousRequests)
    {
        $this->previousRequests=$previousRequests;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [
            'id'=> $this->previousRequests,
            'title'=>'Add new request',
            'user'=> auth()->User()->username,
        ];
    }
}
