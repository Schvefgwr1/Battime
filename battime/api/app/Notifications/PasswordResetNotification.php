<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    use Queueable;
    public $url;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($url)
    {
        $this->url = $url;
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
            ->subject('Запрос на сброс пароля. Battime')
            ->greeting('Здравствуйте!')
                ->line("Мы получили запрос на сброс пароля для вашего аккаунта на сайте Battime. Если вы действительно хотите изменить пароль, пожалуйста, нажмите на кнопку ниже.")
                ->action("Изменить пароль", url($this->url))
                ->line("Это безопасная ссылка, которая поможет вам создать новый пароль. Обратите внимание, что она будет действительна в течение одного часа. Если вы не запрашивали восстановление пароля и считаете это письмо ошибочным, просто проигнорируйте его. Ваш аккаунт останется в безопасности и без изменений.

Если вы не подавали запрос на изменение пароля и получили это письмо, то не переходите по ссылке и, для вашей безопасности, проверьте настройки безопасности вашего аккаунта.")
            ->salutation("До скорого!");

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
