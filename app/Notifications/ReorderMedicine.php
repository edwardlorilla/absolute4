<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class ReorderMedicine extends Notification
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
    protected $product_id;
    public function __construct($message, $reorder, $quantity, $product_id)
    {
        $this->message = $message;
        $this->reorder = $reorder;
        $this->quantity = $quantity;
        $this->product_id = $product_id;
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
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'message' => $this->message,
            'reorder' => $this->reorder,
            'quantity' => $this->quantity,
            'product_id' => $this->product_id,
            'item' => ''
        ];
    }
}
