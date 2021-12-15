<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ResetPassword extends Notification
{
    use Queueable;

    public $token;


    public function __construct($token)
    {
        $this->token = $token;
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->greeting('Здравствуйте!')
            ->line('Вы получили это письмо, потому что поступил запрос на сброс пароля для вашей учетной записи.')
            ->action('Сменить пароль', route('password.reset', ['token' => $this->token]))
            ->line('Срок действия ссылки для сброса пароля истечет через 60 минут.')
            ->line('Если вы не запрашивали сброс пароля, просто проигнорируйте это сообщение.')
            ->line('Спасибо, что пользуетесь нашим приложением!');
    }
}
