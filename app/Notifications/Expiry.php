<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Expiry extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $user;
    protected $data;
    protected $name;
    protected $expire_date;
    public function __construct($user, $data, $name, $expire_date)
    {
        $this->user = $user;
        $this->data = $data;
        $this->name = $name;
        $this->expire_date = $expire_date;
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
        $currentDate = new \DateTime(date('Y-m-d'));
        $diff = $currentDate->diff(  new \DateTime(date( $this->expire_date)))->days;
        return [
            'message' =>  $this->name . ' has due to expire by ' . $this->expire_date . ' ('.$diff.'days)' ,
            'data' => $this->data,
            'user_id' => $this->user->id,
            'type' => 'expiry'
        ];
    }
}
