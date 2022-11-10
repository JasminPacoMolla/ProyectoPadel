<?php

namespace app\Servicios;
include __DIR__."../../autoload.php";

use app\Horarios\HorarioMensual;
use app\Servicios\Enums\TipoPista;

class Pista
{
    private int $idPista;
    private float $precio;
    private bool $luz;
    private float $precioLuz;
    private bool $cubierta;
    private TipoPista $tipoPista;
    private HorarioMensual $reservaPistaMensual;
    private bool $disponible;

    /**
     * @param int $idPista
     * @param float $precio
     * @param bool $luz
     * @param float $precioLuz
     * @param bool $cubierta
     * @param TipoPista $tipoPista
     * @param HorarioMensual $reservaPistaMensual
     */
    public function __construct(int $idPista, float $precio, bool $luz, float $precioLuz, bool $cubierta, TipoPista $tipoPista, HorarioMensual $reservaPistaMensual)
    {
        $this->idPista = $idPista;
        $this->precio = $precio;
        $this->luz = $luz;
        $this->precioLuz = $precioLuz;
        $this->cubierta = $cubierta;
        $this->tipoPista = $tipoPista;
        $this->reservaPistaMensual = $reservaPistaMensual;
        $this ->disponible = true;
    }

    /**
     * @return int
     */
    public function getIdPista(): int
    {
        return $this->idPista;
    }

    /**
     * @param int $idPista
     * @return Pista
     */
    public function setIdPista(int $idPista): Pista
    {
        $this->idPista = $idPista;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrecio(): float
    {
        return $this->precio;
    }

    /**
     * @param float $precio
     * @return Pista
     */
    public function setPrecio(float $precio): Pista
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return bool
     */
    public function isLuz(): bool
    {
        return $this->luz;
    }

    /**
     * @param bool $luz
     * @return Pista
     */
    public function setLuz(bool $luz): Pista
    {
        $this->luz = $luz;
        return $this;
    }

    /**
     * @return float
     */
    public function getPrecioLuz(): float
    {
        return $this->precioLuz;
    }

    /**
     * @param float $precioLuz
     * @return Pista
     */
    public function setPrecioLuz(float $precioLuz): Pista
    {
        $this->precioLuz = $precioLuz;
        return $this;
    }

    /**
     * @return bool
     */
    public function isCubierta(): bool
    {
        return $this->cubierta;
    }

    /**
     * @param bool $cubierta
     * @return Pista
     */
    public function setCubierta(bool $cubierta): Pista
    {
        $this->cubierta = $cubierta;
        return $this;
    }

    /**
     * @return TipoPista
     */
    public function getTipoPista(): TipoPista
    {
        return $this->tipoPista;
    }

    /**
     * @param TipoPista $tipoPista
     * @return Pista
     */
    public function setTipoPista(TipoPista $tipoPista): Pista
    {
        $this->tipoPista = $tipoPista;
        return $this;
    }

    /**
     * @return HorarioMensual
     */
    public function getReservaPistaMensual(): HorarioMensual
    {
        return $this->reservaPistaMensual;
    }

    /**
     * @param HorarioMensual $reservaPistaMensual
     * @return Pista
     */
    public function setReservaPistaMensual(HorarioMensual $reservaPistaMensual): Pista
    {
        $this->reservaPistaMensual = $reservaPistaMensual;
        return $this;
    }

    /**
     * @return bool
     */
    public function isDisponible(): bool
    {
        return $this->disponible;
    }

    /**
     * @param bool $disponible
     * @return Pista
     */
    public function setDisponible(bool $disponible): Pista
    {
        $this->disponible = $disponible;
        return $this;
    }
    public function generarHorarioMensual():Pista{
        //TODO
        return $this;
    }


}