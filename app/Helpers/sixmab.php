<?php

function imprimirDato($dato){
    return (is_null($dato)) ? 'Sin registro' : round($dato, 2);
 }

function num_notificaciones(){
    //sleep(100);
    $notificaciones = auth()->user()->unreadNotifications;
    return count($notificaciones);
}

function detalle_notificaciones(){
    $notificaciones = auth()->user()->unreadNotifications;

    $nuevas = count($notificaciones->filter(function($value){
        return $value->created_at == $value->updated_at;
    }));

    $sin_leer = count($notificaciones->filter(function($value){
        return $value->created_at < $value->updated_at;
    }));

    if($nuevas > 1){
        $nuevas = 'Tienes '.$nuevas.' alarmas nuevas';
    } elseif($nuevas == 1){
        $nuevas = 'Tienes '.$nuevas.' alarma nueva';
    }

    if($sin_leer > 1){
        $sin_leer = 'Tienes '.$sin_leer.' alarmas sin leer';
    } elseif($sin_leer == 1){
        $sin_leer = 'Tienes '.$sin_leer.' alarma sin leer';
    }

    return compact('nuevas', 'sin_leer');
}