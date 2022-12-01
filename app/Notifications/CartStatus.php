<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CartStatus extends Notification implements ShouldQueue
{
    use Queueable;

    private $previousStatus;
    private $currrentStatus;

    public function __construct($previousStatus, $currrentStatus)
    {
        $this->previousStatus = $previousStatus;
        $this->currrentStatus = $currrentStatus;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('باسلام')
            ->line("خرید شما از حالت $this->previousStatus خارج و هم اکنون وارد حالت $this->currrentStatus شده است")
            ->line('از خرید از رستوران ما متشکریم');
    }

}
