<?php

namespace App\Http\Controllers;

use App\Models\Alarma;
use App\Models\Procesos\Bateria;
use App\Models\PasosSixmab\MonitoreoMedicion;
use App\User;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;
use Illuminate\Http\Request;

use PDF;
use DB;

use Illuminate\Support\Facades\Notification;

class AlarmasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alarmas = Alarma::all();

        $notificaciones = auth()->user()->notifications;

        if($notificaciones){
            $alarmas_not = $notificaciones->map(function($item, $key)
            {
                $bateria = DB::table('bateria')
                ->select('numero_bateria')
                ->where('dispositivo_id', $item->data['dispositivo_id'])
                ->get()->first();

                $medicion = MonitoreoMedicion::find($item->data['medicion_id'])->updated_at;
    
                $hora = date("H:i:s", strtotime($medicion));
    
                $fecha = date("d/m/Y", strtotime($medicion));
    
                $alarma = Alarma::find($item->data['alarma_id']);
                $alarma_estado = $alarma->solucionado;
                $alarma_id = $alarma->id;
    
                $leida = $item->read_at == null ? false : true;
                
                if($item->updated_at == $item->created_at){
                    $nuevo = true;
                    $item->updated_at = now();
                    $item->save();
                } else{
                    $nuevo = false;
                }
    
                return compact('bateria', 'hora', 'fecha', 'alarma_id', 'alarma_estado', 'leida', 'nuevo');
            });
        } else{
            $alarmas_not = [];
        }

        return view('alarma.index', compact('notificaciones', 'alarmas_not'));
    }

    public function detalle($alarma_id)
    {
        $data = $this->obtener_detalle($alarma_id);

        return view('alarma.detalle', compact('data', 'alarma_id'));
    }

    public function generarPdf($alarma_id)
    {
        $data = $this->obtener_detalle($alarma_id);

        $pdf = PDF::loadView('alarma.pdf', compact('data'));
        return $pdf->stream('alarma.pdf');
    }

    private function obtener_detalle($alarma_id)
    {
        $alarma = Alarma::find($alarma_id);

        $medicion = MonitoreoMedicion::find($alarma->medicion_id);

        $bateria = Bateria::find($medicion->bateria_id)->numero_bateria;

        $hora = date("H:i:s", strtotime($medicion->updated_at));
        $fecha = date("d/m/Y", strtotime($medicion->updated_at));

        $medicion->detalle_medicion();

        return compact('medicion', 'bateria', 'hora', 'fecha');
    }

    public function obtener_notificaciones()
    {
        $user = auth()->user();
        $notificaciones = $user->unreadNotifications;

        return count($notificaciones);
    }

    public function actualizar_notificaciones($alarma_id)
    {
        $user = auth()->user();

        $notificaciones = $user->unreadNotifications;

        $notificacion = $notificaciones->filter(function ($value, $key) use ($alarma_id, $user) {
            return $value->data['alarma_id'] == $alarma_id && $value->notifiable_id == $user->id;
        })->first();

        if($notificacion){
            $notificacion->markAsRead();
        }

        return 1;
    }
}