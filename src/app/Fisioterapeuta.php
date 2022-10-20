<?php

namespace app;

class Fisioterapeuta extends Empleado
{
    private $numColegiado;
    private $clientVIP;

    /**
     * @param $numColegiado
     */
    public function __construct(string $dni,string $nombre,string $apellidos,string $direccion,string $cuentaCorriente,string $numSeguridadSocial,$numColegiado)
    {
        parent::__construct($dni,$nombre,$apellidos,$direccion,$cuentaCorriente,$numSeguridadSocial);
        $this->numColegiado = $numColegiado;
    }

    /**
     * @return mixed
     */
    public function getNumColegiado()
    {
        return $this->numColegiado;
    }

    /**
     * @param mixed $numColegiado
     * @return Fisioterapeuta
     */
    public function setNumColegiado($numColegiado)
    {
        $this->numColegiado = $numColegiado;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getClientVIP()
    {
        return $this->clientVIP;
    }

    /**
     * @param mixed $clientVIP
     * @return Fisioterapeuta
     */
    public function setClientVIP($clientVIP)
    {
        $this->clientVIP = $clientVIP;
        return $this;
    }



}