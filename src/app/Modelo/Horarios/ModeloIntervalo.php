<?php
namespace app\Modelo\Horarios;

use app\Horarios\Intervalo;
use app\Modelo\Exceptions\PersonaNoEncontradaException;
use app\Personas\Persona;

class ModeloIntervalo
{
    private \PDO $conexion;


    public function __construct()
    {
        $this->conexion(new PDO("mysql:host=db; dbname=padel","jasmin","12345"));
        $this->conexion()->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }
    /*****************************************************************************/

    public function insertarIntervalo(Intervalo $intervalo,$fecha):?Intervalo{
        $query = 'Insert into intervaloDia (horaInicio,horaFin,disponibilidad,idHorarioDiario) 
values (:inicio,:fin,:disponibilidad,:horario)';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindValue("inicio",$intervalo->getHoraInicio);
        $sentencia->bindValue("fin",$intervalo->getHoraFin);
        $sentencia->bindValue("horario",$fecha);
        $sentencia->bindValue("diponibilidad",$intervalo->isDisponible);


        $resultado = $sentencia->execute();
        if($resultado){
            return $intervalo;
        }
        else{
            return null;
        }
    }
    /*****************************************************************************/

    public function leerIntervaloPorId(int $id, \DateTime $fecha):?Intervalo  {

        $query = "SELECT * FROM intervaloDia WHERE id= ? and idHorarioDiario=?";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(1, $id);
        $sentencia->bindParam(2, $fecha);

        $sentencia->execute();

        if (($fila = $sentencia->fetch())) {
            return $this->convertirArrayIntervalo($fila);
        }
        else{
            throw new PersonaNoEncontradaException("El intervalo no existe en la base de datos");
        }

    }
    /*******************************************************************************/
    public function leerIntervaloPorHoraInicio(Intervalo $intervalo, \DateTime $fecha):?Intervalo  {
        $horaInicio = $intervalo->getHoraInicio();
        $query = "SELECT * FROM intervaloDia WHERE horaInicio= ? and idHorarioDiario=?";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(1, $horaInicio);
        $sentencia->bindParam(2, $fecha);

        $sentencia->execute();

        if (($fila = $sentencia->fetch())) {
            return $this->convertirArrayIntervalo($fila);

        }
        else{
            throw new PersonaNoEncontradaException("El intervalo no existe en la base de datos");
        }

    }
    /*****************************************************************************/

    public function leerIntervalosDelDia(\DateTime $fechaHorario):?Intervalo{
        $query = "SELECT * FROM intervaloDia WHERE idHorarioDiario=?";

        $sentencia= $this->conexion->prepare($query);
        $sentencia->bindParam(1,$fechaHorario);

        $arrayResultados = $sentencia->fetchAll();
        $arrayObjetos = [];

        foreach ($arrayResultados as $filaPersona){
            $arrayObjetos[] = $this->convertirArrayIntervalo($filaPersona);
        }

        return $arrayObjetos;

    }
    /*****************************************************************************/

    public function borrarIntervalosDelDia(\DateTime $fecha):?Intervalo {
        $query = "delete from intervaloDia where idHorarioDiario=?";
        $sentencia= $this->conexion->prepare($query);
        $sentencia->bindParam(1,$fecha);

        $resultado = $sentencia->execute();
        try{
            $intervalo = $this->leerIntervalosDelDia($fecha);
        }catch(PersonaNoEncontradaException $e){
            throw new PersonaNoEncontradaException("No se puede borrar");
        }

        if($resultado){
            return $intervalo;
        }else{
            return $resultado;
        }
    }
    /*************************************************************************/
    public function borrarUnIntervaloPorId(int $id,\DateTime $fecha):?Intervalo {
        $intervalo = $this->leerIntervaloPorId($id,$fecha);
        $this->borrarUnIntervalo($intervalo,$fecha);
        return $intervalo;
    }
    /*****************************************************************************/
    public function borrarUnIntervalo(Intervalo $intervalo,\DateTime $fecha): ?Intervalo
    {
        $query = "delete from intervaloDia where horaInicio=? and idHorarioDiario=?";
        $sentencia= $this->conexion->prepare($query);
        $horaInicio = $intervalo->getHoraInicio();
        $sentencia->bindParam(1,$horaInicio);
        $sentencia->bindParam(2,$fecha);
        $resultado = $sentencia->execute();

        if($resultado){
            return $intervalo;
        }else{
            return $resultado;
        }
    }

    /*****************************************************************************/

    public function modificarIntervalo(Intervalo $intervalo,int $fecha):?Intervalo{
        $query = "update intervaloDia set horaInicio=:inicio,
                                          horaFin=:fin,
                                          disponibilidad=:dispo
                        
                                    where idHorarioDiario=:idh";

        $sentencia = $this->conexion()->prepare($query);
        $sentencia->bindValue("inicio",$intervalo->getHoraInicio());
        $sentencia->bindValue("fin",$intervalo->getHoraFin());
        $sentencia->bindValue("dispo",$intervalo->isDisponibilidad());
        $sentencia->bindValue("idHorarioDiario",$fecha);

        $resultado = $sentencia->execute();

        if($resultado){
            return $intervalo;
        }else{
            return null;
        }
    }

    /*****************************************************************************/

    public function convertirArrayIntervalo(array $datosIntervalo):?Intervalo{
        return new Persona($datosIntervalo['inicioIntervalo'],$datosIntervalo['finIntervalo']);
    }
}