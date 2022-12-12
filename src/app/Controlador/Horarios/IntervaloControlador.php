<?php

namespace app\Controlador\Horarios;



use app\Modelo\Horarios\ModeloIntervalo;
use app\Personas\Persona;

class IntervaloControlador{
    private ModeloIntervalo $modelo;
//    private PersonaVista $vista;

    public function guardar(){
        $respuestaPersona = $this->comprobarDatosPersona("post");
        if($respuestaPersona){
            $persona = new Persona($_POST['dni'],$_POST['nombre'],$_POST['apellidos'],password_hash($_POST['correoelectronico'],PASSWORD_DEFAULT),$_POST['contrasenya']);
            if(isset($_POST['telefono'])){
                $persona->setTelefono($_POST['telefono']);
            }
            $this->modelo->insertarPersona($persona);
        }
        else{
            $mensajeError = "Se han producido errores en los siguientes campos <br>";

            foreach ($respuestaPersona as $error) {
                $mensajeError.=":error en el parámetro $error <br>";
            }

        }

    }






}