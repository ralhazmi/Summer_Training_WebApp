<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\Models\User;

class reportsnoti extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    private $Reports;

    public function __construct($Reports)
    {
        $this->Reports=$Reports;


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
            'id'=>$this->Reports->id ?? 'default_value',
            'title'=>'Add new report',
            'user'=> auth()->User()->username,
        ];
    }
}
