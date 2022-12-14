<?php

namespace app\Modelo\Personas;

use app\Modelo\Exceptions\ActualizarPersonasException;
use app\Modelo\Exceptions\MongoDBConexionIncorrectaException;
use app\Personas\Persona;
use \MongoDB\Client;
use MongoDB\Collection;
use MongoDB\Database;

class PersonaDAOMongoDb extends PersonaDAO implements InterfazPersona
{
    private Database $db;
    private Collection $colleccion;
    public function __construct(){
        if(! $this->setConexion(new Client("mongodb://root:example@mongo:27017"))){
            throw new MongoDBConexionIncorrectaException();
        }
        $this->db = $this->getConexion()->padel;
        $this->colleccion = $this->db->persona;
//        $this->colleccion->createIndex(["DNI"=>1],["unique"=>true]);
//        $this->colleccion->createIndex(["CORREOELECTRONICO"=>1],["unique"=>true]);

    }


    public function insertarPersona(Persona $persona):?Persona{
        $this->colleccion->insertOne($persona->jsonSerializeMongo());
        return $persona;

    }
    public function modificarPersona(Persona $persona):?Persona{

        $resultado = $this->colleccion->updateOne( ['DNI' => $persona->getDni()],
            ['$set' =>  ['NOMBRE' => $persona->getNombre(),
                        'APELLIDOS' => $persona->getApellidos(),
                        'CORREOELECTRONICO' => $persona->getCorreoElectronico(),
                        'TELEFONO' => $persona->getTelefono(),
                        'CONTRASENYA' => $persona->getContrasenya()]

                ]);
        if($resultado){
            return $persona;
        }
        else{
            return null;
        }
    }

    public function modificarTodasLasPersonas(array $elementosAModificar){

        try{
            $update = array(
                '$set' => $elementosAModificar
            );
            $this->colleccion->updateMany(array(), $update, array('multiple' => true));

        }catch (\PDOException $e){
            throw new ActualizarPersonasException("no se puede actualizar");
        }
    }




    public function borrarPersona(Persona $persona):?Persona{
        $this->colleccion->deleteOne($persona->jsonSerializeMongo());
        return $persona;
    }
    public function borrarPersonaPorDni(string $DNI):?Persona{
        $persona = $this->leerPersona($DNI);
        $this->colleccion->deleteOne($persona->jsonSerializeMongo());
        return $persona;
    }
    public function leerPersona(string $dni):?Persona{
        $persona = $this->colleccion->findOne(["DNI"=>$dni]);
        return new Persona($persona["DNI"],$persona["NOMBRE"],$persona["APELLIDOS"],$persona["TELEFONO"],$persona["CORREOELECTRONICO"],$persona["CONTRASENYA"]);
    }
    public function leerPersonaPorCorreo(string $correo):?Persona{
        $persona = $this->colleccion->findOne(["CORREOELECTRONICO"=>$correo]);
        return new Persona($persona["DNI"],$persona["NOMBRE"],$persona["APELLIDOS"],$persona["TELEFONO"],$persona["CORREOELECTRONICO"],$persona["CONTRASENYA"]);
    }
    public function leerTodasLasPersonas():array{
        $retorno = $this->colleccion->find();
        foreach ($retorno as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(),JSON_PRETTY_PRINT);
            echo "</pre>";
           $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $arrayRetorno;
    }


    public function obtenerPersonasSinTelefono():array{
        $personas = $this->colleccion->find(array("TELEFONO" => array('$exists' => false)));
        foreach ($personas as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(),JSON_PRETTY_PRINT);
            echo "</pre>";
            $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
    return $arrayRetorno;
    }
    public function obtenerPersonaPorNombre(string $nombre):array{
        $personas = $this->colleccion->find(array("NOMBRE" => $nombre));
        foreach ($personas as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(),JSON_PRETTY_PRINT);
            echo "</pre>";
            $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $arrayRetorno;
    }
    public function obtenerPersonasPorApellidos(string $apellidos): array{
        $personas = $this->colleccion->find(array("APELLIDOS" => $apellidos));
        foreach ($personas as $documento){
            echo "<pre>";
            echo json_encode($documento->getArrayCopy(),JSON_PRETTY_PRINT);
            echo "</pre>";
            $arrayRetorno[] = $this->convertirArrayPersona($documento->getArrayCopy());
        }
        return $arrayRetorno;
    }
    public function obtenerRangoPersonas(int $inicio,int $numeroResultado=1):array{
        $personas = $this->colleccion->find([],['skip'=>$inicio,'limit' => $numeroResultado]);
       echo json_encode($personas,JSON_PRETTY_PRINT);
        foreach ($personas as $persona){
            $arrayRetorno[] = $this->convertirArrayPersona($persona->getArrayCopy());
        }
        return $arrayRetorno;
    }

}