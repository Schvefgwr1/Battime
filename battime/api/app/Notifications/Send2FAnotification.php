<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class Send2FAnotification extends Notification
{
    use Queueable;
    private $two_factor_code;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($two_factor_code)
    {
        $this->two_factor_code = $two_factor_code;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {

        return (new MailMessage)
            ->subject('Код подтверждения для двухфакторной аутентификации')
            ->greeting('Здравствуйте!')
            ->line('Ваш код подтверждения для доступа к аккаунту: ' . $this->two_factor_code)
            ->line('Код действителен в течение нескольких минут. Пожалуйста, не делитесь этим кодом с другими.')
            ->action('Войти в аккаунт(жду ссыку на фронт)', url('/'))
            ->line('Если вы не пытались войти в систему, это может быть знаком попытки несанкционированного доступа. Срочно свяжитесь с нашей командой поддержки!')
            ->salutation('Спасибо за использование нашего приложения!')
            ->line('Команда поддержки: Кабанчик');
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
            //
        ];
    }
}
