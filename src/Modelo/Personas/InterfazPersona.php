<?php
namespace Modelo\Personas;

use app\Personas\Persona;

interface InterfazPersona{
    public function insertarPersona(Persona $persona):?Persona;
    public function modificarPersona(Persona $persona):?Persona;
    public function borrarPersona(Persona $persona):?Persona;
    public function borrarPersonaPorDni(string $DNI):?Persona;
    public function leerPersona(string $dni):?Persona;
    public function leerPersonaPorCorreo(string $correo):?Persona;
    public function leerTodasLasPersonas():array;
    public function obtenerPersonasSinTelefono():array;
    public function obtenerPersonaPorNombre(string $nombre):array;
    public function obtenerPersonasPorApellidos(string $apellidos): array;
    public function obtenerRangoPersonas(int $inicio,int $numeroResultado):array;


}