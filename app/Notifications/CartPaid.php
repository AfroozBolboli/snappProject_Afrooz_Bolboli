<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class CartPaid extends Notification implements ShouldQueue
{
    use Queueable;

    private $amount;
    public function __construct($amount)
    {
        $this->amount = $amount;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('باسلام')
            ->line('سبد خرید شما پرداخت شد و هم اکنون در حال بررسی است')
            ->lineIf($this->amount > 0, "{$this->amount} مقدار پرداخت شده")
            ->action('دیدن فاکتور', '#')
            ->line('از خرید از رستوران ما متشکریم');
    }
}
