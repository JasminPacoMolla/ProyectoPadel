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

    /**
     * @return PersonaDAO
     */
    public function getModelo(): PersonaDAO
    {
        return $this->modelo;
    }

    /**
     * @param PersonaDAO $modelo
     * @return PersonaControlador
     */
    public function setModelo(PersonaDAO $modelo): PersonaControlador
    {
        $this->modelo = $modelo;
        return $this;
    }

    /**
     * @return PersonaVista
     */
    public function getVista(): PersonaVista
    {
        return $this->vista;
    }

    /**
     * @param PersonaVista $vista
     * @return PersonaControlador
     */
    public function setVista(PersonaVista $vista): PersonaControlador
    {
        $this->vista = $vista;
        return $this;
    }





}