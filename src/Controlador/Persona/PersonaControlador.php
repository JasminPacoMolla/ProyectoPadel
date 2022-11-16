<?php
namespace Controlador\Persona;




use Modelo\Personas\PersonaDAO;
use Modelo\Personas\PersonaDAOMySQL;
use app\Personas\Persona;

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
             if(password_verify($pass,$persona->getContrasenya())){
               //  echo "it works";
             }
             else{
                 //echo "it doesn't work";
             }

    }
    public function crear(){

        $pasCifrado = password_hash("1234",PASSWORD_DEFAULT);
        $persona = new Persona("2331111","ayoub","moussaoui","ymoussaoui15@gmail.com",$pasCifrado);
        $this->modelo->insertarPersona($persona);
    }
    public function login()  {
        echo "Este es la página de login";
    }





}