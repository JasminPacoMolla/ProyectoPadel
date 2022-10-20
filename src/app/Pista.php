<?php

namespace app;

class Pista
{
    private $idPista;
    private $precio;
    private $luz;
    private $precioLuz;
    private $cubierta;
    private $tipoPista;
    private $reservaPistaMensual;
    private $disponible;

    /**
     * @param $idPista
     * @param $precio
     * @param $luz
     * @param $precioLuz
     * @param $cubierta
     * @param $tipoPista
     * @param $reservaPistaMensual
     */
    public function __construct($idPista, $precio, $luz, $precioLuz, $cubierta, $tipoPista, $reservaPistaMensual)
    {
        $this->idPista = $idPista;
        $this->precio = $precio;
        $this->luz = $luz;
        $this->precioLuz = $precioLuz;
        $this->cubierta = $cubierta;
        $this->tipoPista = $tipoPista;
        $this->reservaPistaMensual = $reservaPistaMensual;
        $this->disponible = true;
    }

    /**
     * @return mixed
     */
    public function getIdPista()
    {
        return $this->idPista;
    }

    /**
     * @param mixed $idPista
     * @return Pista
     */
    public function setIdPista($idPista)
    {
        $this->idPista = $idPista;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     * @return Pista
     */
    public function setPrecio($precio)
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLuz()
    {
        return $this->luz;
    }

    /**
     * @param mixed $luz
     * @return Pista
     */
    public function setLuz($luz)
    {
        $this->luz = $luz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecioLuz()
    {
        return $this->precioLuz;
    }

    /**
     * @param mixed $precioLuz
     * @return Pista
     */
    public function setPrecioLuz($precioLuz)
    {
        $this->precioLuz = $precioLuz;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCubierta()
    {
        return $this->cubierta;
    }

    /**
     * @param mixed $cubierta
     * @return Pista
     */
    public function setCubierta($cubierta)
    {
        $this->cubierta = $cubierta;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTipoPista()
    {
        return $this->tipoPista;
    }

    /**
     * @param mixed $tipoPista
     * @return Pista
     */
    public function setTipoPista($tipoPista)
    {
        $this->tipoPista = $tipoPista;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getReservaPistaMensual()
    {
        return $this->reservaPistaMensual;
    }

    /**
     * @param mixed $reservaPistaMensual
     * @return Pista
     */
    public function setReservaPistaMensual($reservaPistaMensual)
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