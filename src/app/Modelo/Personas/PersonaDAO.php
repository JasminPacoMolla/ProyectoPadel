<?php

namespace app\Modelo\Personas;

use app\Personas\Persona;
use \PDO;



abstract class PersonaDAO implements InterfazPersona
{
    private $conexion;

    /**
     * @return PDO
     */
    public function getConexion()
    {
        return $this->conexion;
    }

    /**
     * @param  $conexion
     * @return PersonaDAO
     */
    public function setConexion( $conexion): PersonaDAO
    {
        $this->conexion = $conexion;
        return $this;
    }


    public function insertarPersona(Persona $persona): ?Persona
    {
        // TODO: Implement insertarPersona() method.
    }

    public function modificarPersona(Persona $persona): ?Persona
    {
        // TODO: Implement modificarPersona() method.
    }

    public function borrarPersona(Persona $persona): ?Persona
    {
        // TODO: Implement borrarPersona() method.
    }

    public function borrarPersonaPorDni(string $DNI): ?Persona
    {
        // TODO: Implement borrarPersonaPorDni() method.
    }

    public function leerPersona(string $dni): ?Persona
    {
        // TODO: Implement leerPersona() method.
    }
    public function leerPersonaPorCorreo(string $correo): ?Persona
    {
        // TODO: Implement leerPersona() method.
    }

    public function leerTodasLasPersonas(): array
    {
        // TODO: Implement leerTodasLasPersonas() method.
    }

    public function obtenerPersonasSinTelefono(): array
    {
        // TODO: Implement obtenerPersonasSinTelefono() method.
    }

    public function obtenerPersonaPorNombre(string $nombre): array
    {
        // TODO: Implement obtenerPersonaPorNombre() method.
    }

    public function obtenerPersonasPorApellidos(string $apellidos): array
    {
        // TODO: Implement obtenerPersonasPorApellidos() method.
    }

    public function obtenerRangoPersonas(int $inicio, int $numeroResultado): array
    {
        // TODO: Implement obtenerRangoPersonas() method.
    }

    protected function convertirArrayPersona(array $datosPersona):?Persona{
        if(!isset($datosPersona['TELEFONO']) || ($datosPersona['TELEFONO'] == NULL)){
            $datosPersona['TELEFONO'] = '';
        }
        return new Persona($datosPersona['DNI'],$datosPersona['NOMBRE'],$datosPersona['APELLIDOS'],$datosPersona['CORREOELECTRONICO'],
            $datosPersona['CONTRASENYA'],$datosPersona['TELEFONO']);
    }
}