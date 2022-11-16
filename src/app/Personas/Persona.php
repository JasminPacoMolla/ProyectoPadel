<?php

namespace app\Personas;

class Persona
{
    /**
     * @var string
     */
    private string $dni;
    /**
     * @var string
     */
    private string $nombre;
    /**
     * @var string
     */
    private string $apellidos;
    /**
     * @var string
     */
    private string $correoElectronico;
    /**
     * @var string
     */
    private string $contrasenya;
    /**
     * @var string|null
     */
    private string $telefono;

    /**
     * @param string $dni
     * @param string $nombre
     * @param string $apellidos
     * @param string $correoElectronico
     * @param string $contrasenya
     * @param string|null $telefono
     */
    public function __construct(string $dni, string $nombre, string $apellidos,string $correoElectronico,string $contrasenya,string $telefono=''){
        $this -> dni = $dni;
        $this ->nombre = $nombre;
        $this->apellidos = $apellidos;
        $this->correoElectronico = $correoElectronico;
        $this->contrasenya = $contrasenya;
        $this->telefono = $telefono;

    }

    /**
     * @param string $dni
     * @return $this
     */
    public function setDni(string $dni):Persona{
        $this ->dni = $dni;
        return $this;
    }

    /**
     * @return string
     */
    public function getDni():string{
        return $this->dni;
    }

    /**
     * @return string
     */
    public function getNombre(): string
    {
        return $this->nombre;
    }

    /**
     * @param string $nombre
     * @return Persona
     */
    public function setNombre(string $nombre): Persona
    {
        $this->nombre = $nombre;
        return $this;
    }

    /**
     * @return string
     */
    public function getApellidos(): string
    {
        return $this->apellidos;
    }

    /**
     * @param string $apellidos
     * @return Persona
     */
    public function setApellidos(string $apellidos): Persona
    {
        $this->apellidos = $apellidos;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelefono():string
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     * @return Persona
     */
    public function setTelefono($telefono):?Persona
    {
        $this->telefono = $telefono;
        return $this;
    }

    /**
     * @return string
     */
    public function getCorreoElectronico(): string
    {
        return $this->correoElectronico;
    }

    /**
     * @param string $correoElectronico
     * @return Persona
     */
    public function setCorreoElectronico(string $correoElectronico): Persona
    {
        $this->correoElectronico = $correoElectronico;
        return $this;
    }

    /**
     * @return string
     */
    public function getContrasenya(): string
    {
        return $this->contrasenya;
    }

    /**
     * @param string $contrasenya
     * @return Persona
     */
    public function setContrasenya(string $contrasenya): Persona
    {
        $this->contrasenya = $contrasenya;
        return $this;
    }










}