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
        $query = 'Insert into intervaloDia (inicioIntervalo,finIntervalo,disponibilidad) 
values (:inicio,:fin,:disponibilidad)';
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindValue("inicio",$intervalo->getHoraInicio);
        $sentencia->bindValue("fin",$intervalo->getHoraFin);
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

    public function leerIntervalo(int $id):?Intervalo  {

        $query = "SELECT * FROM intervaloDia WHERE id= ?";
        $sentencia = $this->conexion->prepare($query);
        $sentencia->bindParam(1, $id);
        $sentencia->execute();

        if (($fila = $sentencia->fetch())) {
            return new Intervalo(
                $fila['inicioIntervalo'],
                $fila['finIntervalo']
            );
        }
        else{
            throw new PersonaNoEncontradaException("El intervalo no existe en la base de datos");
        }

    }
    /*****************************************************************************/

    public function leerIntervaloPorIdHorario(\DateTime $fechaHorario):?Persona{
        $query = "SELECT * FROM intervaloDia WHERE idHorarioDiario=?";

        $sentencia= $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$fechaHorario);

        if($sentencia->execute()){
            $resultado = $sentencia->fetch();
            return $this->convertirArrayIntervalo($resultado);
        }else{
            return null;
        }
    }
    /*****************************************************************************/

    public function borrarPorFechaIntervalo(\DateTime $fecha,int $id):?Intervalo {
        $query = "delete from intervaloDia where id=? and idHorarioDiario=?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$id);
        $sentencia->bindParam(2,$fecha);

        $resultado = $sentencia->execute();
        try{
            $intervalo = $this->leerIntervaloPorIdHorario($fecha);
        }catch(PersonaNoEncontradaException $e){
            throw new PersonaNoEncontradaException("No se puede borrar");
        }

        if($resultado){
            return $intervalo;
        }else{
            return $resultado;
        }
    }
    /*****************************************************************************/
    public function borrarIntervalo(Intervalo $intervalo,\DateTime $fecha): ?Intervalo
    {
        $resultado = $this->borrarIntervaloPorFecha($fecha);
        return $intervalo;
    }

    /*****************************************************************************/

    public function modificarIntervalo(Intervalo $intervalo,int $fecha):?Intervalo{
        $query = "update intervaloDia set inicioIntervalo=:inicio,
                                          finIntervalo=:fin,
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