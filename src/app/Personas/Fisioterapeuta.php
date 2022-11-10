<?php

namespace app\Personas;

class Fisioterapeuta extends Empleado
{
    private $numColegiado;

    private $clientVIP;


    /**
     * @param string $dni
     * @param string $nombre
     * @param string $apellidos
     * @param string $correoElectronico
     * @param string $contrasenya
     * @param string $direccion
     * @param string $cuentaCorriente
     * @param string $numSeguridadSocial
     * @param $numColegiado
     * @param string|null $telefono
     */
    public function __construct(string $dni,string $nombre,string $apellidos,string $correoElectronico,string $contrasenya,
        string $direccion,string $cuentaCorriente,string $numSeguridadSocial,$numColegiado,string $telefono = null)
    {
        parent::__construct($dni,$nombre,$apellidos,$direccion,$cuentaCorriente,$numSeguridadSocial,$correoElectronico,$contrasenya,$telefono);
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