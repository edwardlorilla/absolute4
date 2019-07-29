<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class Reorder extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $message;
    protected $reorder;
    protected $quantity;
    protected $supply_id;
    protected $type;

    public function __construct($message, $reorder, $quantity, $supply_id, $type)
    {
        $this->message = $message;
        $this->reorder = $reorder;
        $this->quantity = $quantity;
        $this->supply_id = $supply_id;
        $this->type = $type;
        
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }


    /**
     * Get the array representation of the notification.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'reorder' => $this->reorder,
            'quantity' => $this->quantity,
            'supply_id' => $this->supply_id,
            'type' => $this->type,
        ];
    }
}
