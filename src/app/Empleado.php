<?php

namespace app;

class Empleado extends Persona
{
    private string $direccion ;
    private string $cuentaCorriente;
    private string $numSeguridadSocial;
    private HorarioMensual $horario;
    private float $precio;
    private bool $disponibilidad;
    private float $salario;

    /**
     * @param $direccion
     * @param $cuentaCorriente
     * @param $numSeguridadSocial
     */
    public function __construct(string $dni,string $nombre,string $apellidos,string $direccion,string $cuentaCorriente,string $numSeguridadSocial)
    {
        parent::__construct($dni,$nombre,$apellidos);
        $this->direccion = $direccion;
        $this->cuentaCorriente = $cuentaCorriente;
        $this->numSeguridadSocial = $numSeguridadSocial;
        $this ->disponibilidad = true;
    }


    /**
     * @return mixed
     */
    public function getDireccion():string
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     * @return Empleado
     */
    public function setDireccion($direccion):Empleado
    {
        $this->direccion = $direccion;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCuentaCorriente():string
    {
        return $this->cuentaCorriente;
    }

    /**
     * @param mixed $cuentaCorriente
     * @return Empleado
     */
    public function setCuentaCorriente($cuentaCorriente):Empleado
    {
        $this->cuentaCorriente = $cuentaCorriente;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getNumSeguridadSocial():string
    {
        return $this->numSeguridadSocial;
    }

    /**
     * @param mixed $numSeguridadSocial
     * @return Empleado
     */
    public function setNumSeguridadSocial($numSeguridadSocial):Empleado
    {
        $this->numSeguridadSocial = $numSeguridadSocial;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getHorario():HorarioMensual
    {
        return $this->horario;
    }

    /**
     * @param mixed $horario
     * @return Empleado
     */
    public function setHorario($horario):Empleado
    {
        $this->horario = $horario;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrecio():float
    {
        return $this->precio;
    }

    /**
     * @param mixed $precio
     * @return Empleado
     */
    public function setPrecio($precio):Empleado
    {
        $this->precio = $precio;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDisponibilidad():bool
    {
        return $this->disponibilidad;
    }

    /**
     * @param mixed $disponibilidad
     * @return Empleado
     */
    public function setDisponibilidad($disponibilidad):Empleado
    {
        $this->disponibilidad = $disponibilidad;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSalario()
    {
        return $this->salario;
    }
    public function calcularSalario():float{
        return  $this->salario = 1*$this->precio;
    }

}