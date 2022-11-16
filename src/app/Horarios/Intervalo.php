<?php

namespace app\Horarios;

use app\Personas\Jugador;
include __DIR__."../../autoload.php";



class Intervalo
{
    private float $horaInicio;
    private float $horaFin;
    private bool $disponibilidad;
    private Jugador $socioReservado;

    /**
     * @param $horaInicio
     * @param $horaFin
     * @param $disponibilidad
     * @param $socioReservado
     */
    public function __construct(float $horaInicio,float $horaFin)
    {
        $this->horaInicio = $horaInicio;
        $this->horaFin = $horaFin;
        $this->disponibilidad = true;
    }

    /**
     * @return float
     */
    public function getHoraInicio(): float
    {
        return $this->horaInicio;
    }

    /**
     * @param float $horaInicio
     * @return Intervalo
     */
    public function setHoraInicio(float $horaInicio): Intervalo
    {
        $this->horaInicio = $horaInicio;
        return $this;
    }

    /**
     * @return float
     */
    public function getHoraFin(): float
    {
        return $this->horaFin;
    }

    /**
     * @param float $horaFin
     * @return Intervalo
     */
    public function setHoraFin(float $horaFin): Intervalo
    {
        $this->horaFin = $horaFin;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisponibilidad(): bool
    {
        return $this->disponibilidad;
    }

    /**
     * @param bool $disponibilidad
     * @return Intervalo
     */
    public function setDisponibilidad(bool $disponibilidad): Intervalo
    {
        $this->disponibilidad = $disponibilidad;
        return $this;
    }

    /**
     * @return Jugador
     */
    public function getSocioReservado(): Jugador
    {
        return $this->socioReservado;
    }

    /**
     * @param Jugador $socioReservado
     * @return Intervalo
     */
    public function setSocioReservado(Jugador $socioReservado): Intervalo
    {
        $this->socioReservado = $socioReservado;
        return $this;
    }

    public function reservarHorario(Jugador $jugador): Intervalo{
        $this -> socioReservado = $jugador;
        return $this;
    }
    public static function calcularFinIntervalo(){

    }


}