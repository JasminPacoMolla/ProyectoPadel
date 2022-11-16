<?php

namespace app\Servicios;
include __DIR__."../../autoload.php";


use app\Horarios\Intervalo;
use app\Personas\Pareja;
use app\Servicios\Pista;

class Partida
{
    private Pareja $pareja1;
    private Pareja $pareja2;
    private Pista $pista;
    private Intervalo $intervaloHorario;

    /**
     * @param Pareja $pareja1
     * @param Pareja $pareja2
     */
    public function __construct(Pareja $pareja1, Pareja $pareja2)
    {
        $this->pareja1 = $pareja1;
        $this->pareja2 = $pareja2;
    }

    /**
     * @return Pareja
     */
    public function getPareja1(): Pareja
    {
        return $this->pareja1;
    }

    /**
     * @param Pareja $pareja1
     * @return Partida
     */
    public function setPareja1(Pareja $pareja1): Partida
    {
        $this->pareja1 = $pareja1;
        return $this;
    }

    /**
     * @return Pareja
     */
    public function getPareja2(): Pareja
    {
        return $this->pareja2;
    }

    /**
     * @param Pareja $pareja2
     * @return Partida
     */
    public function setPareja2(Pareja $pareja2): Partida
    {
        $this->pareja2 = $pareja2;
        return $this;
    }

    /**
     * @return Pista
     */
    public function getPista(): Pista
    {
        return $this->pista;
    }

    /**
     * @param Pista $pista
     * @return Partida
     */
    public function setPista(Pista $pista): Partida
    {
        $this->pista = $pista;
        return $this;
    }

    /**
     * @return Intervalo
     */
    public function getIntervaloHorario(): Intervalo
    {
        return $this->intervaloHorario;
    }

    /**
     * @param Intervalo $intervaloHorario
     * @return Partida
     */
    public function setIntervaloHorario(Intervalo $intervaloHorario): Partida
    {
        $this->intervaloHorario = $intervaloHorario;
        return $this;
    }


    public function generarPartida():?Partida{
        //TODO: funcionalidad para buscar la pista y el horario que mas convenga
        return $this;

    }

}