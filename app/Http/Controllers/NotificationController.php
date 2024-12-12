<?php

namespace App\Http\Controllers;
use Pusher\Pusher;
use App\Models\Notificacion;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notify()
    {
        $options = array(
            'cluster' => env('PUSHER_APP_CLUSTER'),
            'encrypted' => true
        );
        $pusher = new Pusher(
            env('PUSHER_APP_KEY'),
            env('PUSHER_APP_SECRET'),
            env('PUSHER_APP_ID'),
            $options
        );

        $data['message'] = 'Bajo Stock del Producto con ID:';
        $notificacion = new Notificacion();
        $notificacion->mensaje ='Bajo Stock del Producto con ID:';
        $notificacion->id_producto=2;
        $notificacion->save();
        $pusher->trigger('notify-channel', 'App\Events\Notify', $data);
    }
}
