<?php

namespace app\Personas;


use app\Horarios\HorarioMensual;
use app\Personas\Persona;

class Empleado extends Persona
{
    /**
     * @var string
     */
    private string $direccion ;
    /**
     * @var string
     */
    private string $cuentaCorriente;
    /**
     * @var string
     */
    private string $numSeguridadSocial;
    /**
     * @var HorarioMensual
     */
    private HorarioMensual $horario;
    /**
     * @var float
     */
    private float $precio;
    /**
     * @var bool
     */
    private bool $disponibilidad;
    /**
     * @var float
     */
    private float $salario;


    /**
     * @param string $dni
     * @param string $nombre
     * @param string $apellidos
     * @param string $correoElectronico
     * @param string $contrasenya
     * @param string $direccion
     * @param string $cuentaCorriente
     * @param string $numSeguridadSocial
     * @param string|null $telefono
     */
    public function __construct(string $dni,string $nombre,string $apellidos,string $correoElectronico,string $contrasenya,
        string $direccion,string $cuentaCorriente,string $numSeguridadSocial,string $telefono = null)
    {
        parent::__construct($dni,$nombre,$apellidos,$correoElectronico,$contrasenya,$telefono);
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

    /**
     * @return float
     */
    public function calcularSalario():float{
        return  $this->salario = 1*$this->precio;
    }

}