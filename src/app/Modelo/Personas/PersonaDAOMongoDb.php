<?php

namespace app\Modelo\Personas;

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
    }


    public function insertarPersona(Persona $persona):?Persona{
        $this->colleccion->insertOne($persona->jsonSerializeMongo());
        return $persona;

    }
    public function modificarPersona(Persona $persona):?Persona{

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
        var_dump($persona);
        return new Persona($persona["DNI"],$persona["NOMBRE"],$persona["APELLIDOS"],$persona["CORREOELECTRONICO"],$persona["CONTRASENYA"]);
    }
    public function leerPersonaPorCorreo(string $correo):?Persona{
    return null;
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

    }
    public function obtenerPersonaPorNombre(string $nombre):array{

    }
    public function obtenerPersonasPorApellidos(string $apellidos): array{

    }
    public function obtenerRangoPersonas(int $inicio,int $numeroResultado):array{

    }












}