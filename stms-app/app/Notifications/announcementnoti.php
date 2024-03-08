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
     private  $datatoinsert_id;
     private  $users_name;
     private   $title;
    public function __construct($datatoinsert_id,$users_name,$title)
    {
        $this->datatoinsert_id = $datatoinsert_id;
        $this->users_name = $users_name;
        $this->title = $title;
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
            'datatoinsert_id'=>$this->datatoinsert_id,
            'users_name'=>$this->users_name,
            'title'=>$this->title,
        ];
    }
}
