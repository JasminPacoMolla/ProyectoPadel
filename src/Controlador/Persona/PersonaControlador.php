<?php

use Modelo\PersonaDAO;
use Modelo\Personas\PersonaDAOMySQL;

class PersonaControlador
{
    private PersonaDAO $modelo;
    private PersonaVista $vista;

    /**
     * @param PersonaDAO $modelo
     * @param PersonaVista $vista
     */
    public function __construct()
    {
        $this->modelo = new PersonaDAOMySQL();
        // $this->vista = new PersonaVista();
    }
    public function comprobarUsuarioWeb($correoUsuario,$pass){
        $persona = $this->modelo->leerPersonaPorCorreo($correoUsuario);
             password_verify($pass,$persona->getContrasenya());
    }





}