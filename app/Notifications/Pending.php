<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Pending extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    protected $transaction;
    protected $notification_id;

    public function __construct($user,  $transaction, $notification_id)
    {
        $this->user= $user;
        $this->transaction= $transaction;
        $this->notification_id= $notification_id;
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
            'message' =>  $this->user->name . '\'s requested a medicine',
            'data' =>  $this->transaction,
            'user_id' => $this->user->id,
            'type' => 'medical-request',
            'status' => 'pending',
            'notification_id' => $this->notification_id,
            'item' => ''
        ];
    }
}
