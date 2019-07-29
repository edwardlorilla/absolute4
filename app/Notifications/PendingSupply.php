<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class PendingSupply extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    protected $supply;
    protected $type;
    protected $notification_id;
    
    public function __construct($user, $supply, $type, $notification_id)
    {
        $this->user = $user;
        $this->supply = $supply;
        $this->type = $type;
        $this->notification_id = $notification_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
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
            'message' => $this->type == 1 ?  $this->user->name . '\'s requested a medical supply' : $this->user->name . '\'s requested a office supply',
            'data' => $this->supply,
            'user_id' => $this->user->id,
            'type' => $this->type == 1 ?'medical-supply' : 'office-supply',
            'status' => 'pending',
            'notification_id' => $this->notification_id,
            'item' => ''
        ];
    }
}
