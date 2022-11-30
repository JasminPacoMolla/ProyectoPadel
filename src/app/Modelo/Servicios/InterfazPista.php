<?php

namespace app\Modelo\Servicios;

use app\Servicios\Pista;

interface InterfazPista
{
    public function insertarPista(Pista $pista):?Pista;
    public function modificarPista(Pista $pista):?Pista;
    public function borrarPista(Pista $pista):?Pista;
    public function borrarPistaPorId(int $idPista):?Pista;
    public function leerPista(int $idPista):?Pista;
    public function leerTodasLasPistas():?array;




}