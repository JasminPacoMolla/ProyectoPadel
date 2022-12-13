<?php

namespace app\Controlador\Horarios;



use app\Horarios\Intervalo;
use app\Modelo\Exceptions\PersonaNoEncontradaException;
use app\Modelo\Horarios\ModeloIntervalo;
use app\Personas\Persona;

class IntervaloControlador{
    private ModeloIntervalo $modelo;
//    private intervaloVista $vista;

    public function guardar(){
        $respuestaIntervalo = $this->comprobarDatosIntervalo("post");
        if($respuestaIntervalo){
            $intervalo = new Intervalo($_POST['horaInicio'],$_POST['hoarFin']);
            if(isset($_POST['diponibilidad'])){
                $intervalo->setDisponibilidad($_POST['disponibilidad']);
            }
            $this->modelo->insertarIntervalo($intervalo);
        }
        else{
            $mensajeError = "Se han producido errores en los siguientes campos <br>";

            foreach ($respuestaIntervalo as $error) {
                $mensajeError.=":error en el parámetro $error <br>";
            }

        }

    }
    public function borrar(int $id,\DateTime $fecha){
        if(isset($dni)){
            try {
                $this->modelo->borrarUnIntervaloPorId($id,$fecha);
            }
            catch (PersonaNoEncontradaException $e){
                header("intervalo no encontrado",true,500);
            }
        }
        else{
            $this->modelo->borrarTodosLosIntervalos();
        }

    }




    private function mostrarIntervalosDeDia($fecha){
        echo json_encode($this->modelo->leerIntervaloPorIdHorario($fecha),JSON_PRETTY_PRINT);
    }
    private function mostrar($id){
        echo json_encode($this->modelo->leerIntervalo($id),JSON_PRETTY_PRINT);
    }
    private function comprobarDatosIntervalo($metodo){
        $arrayFallos = array();
        if($metodo ==='post'){
            if(!isset($_POST['horaInicio'])){
                $arrayFallos[] = 'horaInicio';
            }
            if(!isset($_POST['hoarFin'])){
                $arrayFallos[] = 'horaFin';
            }
            if(count($arrayFallos) === 0){
                return true;
            }
            else{
                return $arrayFallos;
            }
        }
    }






}