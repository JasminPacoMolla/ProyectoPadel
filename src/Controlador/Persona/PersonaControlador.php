<?php
namespace Controlador\Persona;




use Modelo\Exceptions\ActualizarPersonasException;
use Modelo\Exceptions\PersonaNoEncontradaException;
use Modelo\Personas\PersonaDAO;
use Modelo\Personas\PersonaDAOMySQL;
use app\Personas\Persona;
use Vista\Personas\PersonaVista;

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

    public function mostrar($dni){
        if(isset($dni)){
            try{
                $this->mostrarDatosPersonaAPI($dni);
            }catch(PersonaNoEncontradaException $e){
                echo "No existe la persona buscada ". $e->getMessage();
            }
        }else{
            $this->mostrarTodasLasPersonasAPI();
        }

    }

    private function mostrarTodasLasPersonasAPI(){
        echo json_encode($this->modelo->leerTodasLasPersonas(),JSON_PRETTY_PRINT);
    }
    private function mostrarDatosPersonaAPI($dni){
        echo json_encode($this->modelo->leerPersona($dni),JSON_PRETTY_PRINT);
    }
    public function guardar(){
        $respuestaPersona = $this->comprobarDatosPersona("post");
        if($respuestaPersona){
            $persona = new Persona($_POST['dni'],$_POST['nombre'],$_POST['apellidos'],password_hash($_POST['correoElectronico'],PASSWORD_DEFAULT),$_POST['contrasenya']);
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
    private function comprobarDatosPersona($metodo){
        $arrayFallos = array();
        if($metodo ==='post'){
            if(!isset($_POST['dni'])){
                $arrayFallos[] = 'dni';
            }
            if(!isset($_POST['apellidos'])){
                $arrayFallos[] = 'apellidos';
            }
            if(!isset($_POST['correelectronico'])){
                $arrayFallos[] = 'correoElectronico';
            }
            if(!isset($_POST['contrasenya'])){
                $arrayFallos[] = 'contrasenya';
            }
            if(count($arrayFallos) === 0){
                return true;
            }
            else{
                return $arrayFallos;
            }
        }
    }



    public function borrar($dni){
      if(isset($dni)){
          try {
              $this->modelo->borrarPersonaPorDni($dni);
          }
          catch (PersonaNoEncontradaException $e){
              header("persona no encontrada",true,500);
          }
      }
      else{
          echo "hy";
          $this->modelo->borrarTodasLasPersonas();
      }

    }

    public function modificar($dni){
        parse_str(file_get_contents("php://input"),$put_vars);
        if(isset($dni)){
            try{
                $persona = $this->modelo->leerPersona($dni);
            }
            catch (PersonaNoEncontradaException $e){
                header("PERSONA NO ENCONTRADA",true,404);
                die;
            }
            var_dump($put_vars);
            if(isset($put_vars['dni'])){
               if($this->modelo->existeDni($put_vars['dni'])){
                   header("DNI EXISTE",true,204);
               }else{
                   $persona->setDni($put_vars['dni']);
                   var_dump($put_vars['dni']);

               }

            }
            if(isset($put_vars['nombre'])){
                $persona->setNombre($put_vars['nombre']);
            }
            if(isset($put_vars['apellidos'])){
                $persona->setApellidos($put_vars['apellidos']);
                echo "hy";
            }
            if(isset($put_vars['telefono'])){
                $persona->setTelefono($put_vars['telefono']);
            }
            if(isset($put_vars['contrasenya'])){
                $persona->setContrasenya( password_hash($put_vars['contrasenya'],PASSWORD_DEFAULT));
            }
            if(isset($put_vars['correoelectronico'])){
                if($this->modelo->existeCorreo($put_vars['correoelectronico'])){
                    header("CORREO EXISTE",true,204);
                    die;

                }
                else{
                    $persona->setCorreoElectronico($put_vars['correoelectronico']);

                }
            }
            $this->modelo->modificarPersona($persona);
        }
        else{
            try {
                $this->modelo->modificarTodasLasPersona($put_vars);
            }
            catch (ActualizarPersonasException $e){
                header($e->getMessage(),true,204);
            }
        }
    }



}