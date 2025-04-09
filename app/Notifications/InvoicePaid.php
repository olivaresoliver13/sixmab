<?php

namespace App\Notifications;

use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InvoicePaid extends Notification
{
    use Queueable;

    private $medicion, $mensaje_celdas, $bateria;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($medicion, $mensaje, $bateria, $alarma)
    {
        $this->medicion = $medicion;
        $this->mensaje_celdas = $mensaje;
        $this->bateria = $bateria;
        $this->alarma_id = $alarma;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $date = $this->medicion->updated_at;

        $carbon = Carbon::parse($date);

        $time = $carbon->toTimeString();

        $fecha = $carbon->toDateString();

        $fecha = date("d/m/Y", strtotime($fecha));

        $msj = 'Te informamos que se ha captado una medición inusual '.$this->mensaje_celdas.' a las '.$time;
        $msj .= ' el '.$fecha.' en la bateria registrada con el codigo '.$this->bateria->numero_bateria.'.';

        return (new MailMessage)
                    ->subject('Alarma de bateria '.$this->bateria->numero_bateria)
                    ->greeting('Hola '.$notifiable->nombre)
                    ->success()
                    ->line($msj)
                    ->action('Ver bateria', route('alarmas.detalle', ['alarma_id' => $this->alarma_id]))
                    ->line('Gracias por preferir nuestra plataforma!');
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

    public function toDatabase($notifiable)
    {
        return [
            'medicion_id' => $this->medicion->id,
            'dispositivo_id' => $this->medicion->maestro_id,
            'alarma_id' => $this->alarma_id,
            'nuevo' => true
        ];
    }
}