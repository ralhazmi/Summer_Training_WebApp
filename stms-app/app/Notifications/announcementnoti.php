<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class announcementnoti extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
     private  $Announcements;
    public function __construct($Announcements)
    {
        $this->Announcements = $Announcements;
      
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

    public function toArray(object $notifiable): array
    {
        return [
            
            //'id'=> (int) $this->Announcements->id,
            'title'=>'Add new announcement',
            'user'=> auth()->User()->username,
        ];
    }
}
