<?php

namespace app;

class Entrenador extends Empleado
{
    private int $nivelEntrenador;
    private int $numFederado;
    private Jugador $pupilo;

    /**
     * @param $nivelEntrenador
     * @param $numFederado
     */
    public function __construct(string $dni,string $nombre,string $apellidos,string $direccion,string $cuentaCorriente,string $numSeguridadSocial,int $nivelEntrenador, int $numFederado)
    {
        parent::__construct($dni,$nombre,$apellidos,$direccion,$cuentaCorriente,$numSeguridadSocial);
        $this->nivelEntrenador = $nivelEntrenador;
        $this->numFederado = $numFederado;
    }

    /**
     * @return mixed
     */
    public function getNivelEntrenador():int
    {
        return $this->nivelEntrenador;
    }

    /**
     * @param mixed $nivelEntrenador
     * @return Entrenador
     */
    public function setNivelEntrenador($nivelEntrenador):Entrenador
    {
        $this->nivelEntrenador = $nivelEntrenador;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumFederado():int
    {
        return $this->numFederado;
    }

    /**
     * @param mixed $numFederado
     * @return Entrenador
     */
    public function setNumFederado($numFederado):Entrenador
    {
        $this->numFederado = $numFederado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPupilo():Jugador
    {
        return $this->pupilo;
    }

    /**
     * @param mixed $pupilo
     * @return Entrenador
     */
    public function setPupilo($pupilo):Entrenador
    {
        $this->pupilo = $pupilo;
        return $this;
    }

}