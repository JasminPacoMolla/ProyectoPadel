<?php

namespace Modelo\Personas;
use app\Personas\Persona;
use \PDO;

require_once __DIR__ . "/../../datosConexionBD.php";
require_once __DIR__ . "/../../datosConfiguracion.php";

class PersonaDAOMySQL extends PersonaDAO
{
    public function __construct(){
        //$this->setConexion(new PDO("mysql:host=".HOSTBD."; dbname=".NOMBREBD.,USUARIOBD,PASSBD));
        $this->setConexion(new PDO("mysql:host=db; dbname=padel","jasmin","1234"));

        $this->getConexion()->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }
    public function leerPersona(String $dni):?Persona{
        $query = "Select * FROM PERSONA where DNI =?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia ->bindParam(1,$dni);
        $resultado= $sentencia->execute();
        $fila = $sentencia->fetch();
        return new Persona($fila['DNI'],$fila['NOMBRE'],$fila['APELLIDOS'],$fila['CORREOELECTRONICO'],$fila['CONTRASENYA'],$fila['TELEFONO']);

    }

    public function leerPersonaPorCorreo(String $correo):?Persona{
        $query = "Select * FROM PERSONA where CORREOELECTRONICO =?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia ->bindParam(1,$correo);
       if($sentencia->execute()){
           $fila = $sentencia->fetch();
           return $this->convertirArrayPersona($fila);
       }
       else{
           return null;
       }
    }

    public function modificarPersona(Persona $persona):?Persona{
        $query = "update PERSONA set NOMBRE=:nombre, 
                                    APELLIDOS=:apellidos, 
                                    CORREOELECTRONICO=:correo, 
                                    CONTRASENYA=:password, 
                                    TELEFONO=:telefono 
                                    where DNI=:dni";

        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindValue("nombre",$persona->getNombre());
        $sentencia->bindValue("apellidos",$persona->getApellidos());
        $sentencia->bindValue("correo",$persona->getCorreoElectronico());
        $sentencia->bindValue("password",$persona->getContrasenya());
        $sentencia->bindValue("telefono",$persona->getTelefono());
        $sentencia->bindValue("dni",$persona->getDni());

        $resultado = $sentencia->execute();

        if($resultado){
            return $persona;
        }else{
            return null;
        }
    }

    public function borrarPersonaPorDni($dni):?Persona {
        $persona = $this->leerPersona($dni);
        $query = "delete from persona where DNI=?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$dni);
        $resultado = $sentencia->execute();

        if($resultado){
            return $persona;
        }else{
            return $resultado;
        }
    }

    public function borrarPersona(Persona $persona): ?Persona
    {
       $resultado = $this->borrarPersonaPorDni($persona->getDni());
       return $resultado;
    }

    public function insertarPersona(Persona $persona): ?Persona
    {

        if($persona->getTelefono() !== ''){
            $query = "Insert into PERSONA(DNI,NOMBRE,APELLIDOS,TELEFONO,CORREOELECTRONICO,CONTRASENYA)
            values (:dni,:nombre,:apellidos,:telefono,:correo,:pass)";

            $sentencia = $this->getConexion()->prepare($query);
            $sentencia->bindValue("dni",$persona->getDni());
            $sentencia->bindValue("nombre",$persona->getNombre());
            $sentencia->bindValue("apellidos",$persona->getApellidos());
            $sentencia->bindValue("telefono",$persona->getTelefono());
            $sentencia->bindValue("correo",$persona->getCorreoElectronico());
            $sentencia->bindValue("pass",$persona->getContrasenya());
        }
        else{
            $query = "Insert into PERSONA(DNI,NOMBRE,APELLIDOS,TELEFONO,CORREOELECTRONICO,CONTRASENYA)
        values (:dni,:nombre,:apellidos,NULL,:correo,:pass)";

            $sentencia = $this->getConexion()->prepare($query);
            $sentencia->bindValue("dni",$persona->getDni());
            $sentencia->bindValue("nombre",$persona->getNombre());
            $sentencia->bindValue("apellidos",$persona->getApellidos());
            $sentencia->bindValue("correo",$persona->getCorreoElectronico());
            $sentencia->bindValue("pass",$persona->getContrasenya());
        }


        $resultado = $sentencia->execute();


        if($resultado){
            return $persona;
        }else{
            return 0;
        }

    }
    public function leerTodasLasPersonas(): array{
        $resultado = $this->getConexion()->query("SELECT * FROM PERSONA ");
        $resultado->execute();

        $arrayResultados = $resultado->fetchAll();

        $arrayObjetos = [];

        foreach ($arrayResultados as $filaPersona){
            $arrayObjetos[] = $this->convertirArrayPersona($filaPersona);
        }

        return $arrayResultados;

    }
    public function obtenerRangoPersonas(int $inicio, int $numeroResultados=NUMERODERESULTADOPORPAGINA): array
    {
        $resultado = $this->getConexion()->query("SELECT * FROM PERSONA LIMIT $inicio,$numeroResultados");
        $resultado->execute();

        $arrayResultados = $resultado->fetchAll();

        $arrayObjetos = [];

        foreach ($arrayResultados as $filaPersona){
            $arrayObjetos[] = $this->convertirArrayPersona($filaPersona);
        }

        return $arrayResultados;
    }

    public function obtenerPersonaPorNombre(string $nombre): array
    {
        $arrayPersonas=[];
        $query = "SELECT * FROM PERSONA WHERE NOMBRE = ? ";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$nombre);
        $resultado = $sentencia->execute();
        $persona = $sentencia->fetchAll();
        array_push($arrayPersonas,new Persona($persona['DNI'],$persona['NOMBRE'],$persona['APELLIDOS'],$persona['CORREOELECTRONICO'],$persona['CONTRASENYA'],$persona['TELEFONO']));
        return $arrayPersonas;

    }
    public function obtenerPersonasPorApellidos(string $apellidos): array
    {
        $arrayPersonas=[];
        $query = "SELECT * FROM PERSONA WHERE APELLIDOS = ? ";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$apellidos);
        $resultado = $sentencia->execute();
        $persona = $sentencia->fetch();

        array_push($arrayPersonas,new Persona($persona['DNI'],$persona['NOMBRE'],$persona['APELLIDOS'],$persona['CORREOELECTRONICO'],$persona['CONTRASENYA'],$persona['TELEFONO']));
    return $arrayPersonas;
    }

    public function obtenerPersonasSinTelefono(): array
    {
        $personasSinTelefono = [];
        $query = "SELECT * FROM PERSONA WHERE TELEFONO IS NULL ";
        $sentencia = $this->getConexion()->prepare($query);
        $resultado = $sentencia->execute();
        $persona = $sentencia->fetch();
        array_push($personasSinTelefono,new Persona($persona['DNI'],$persona['NOMBRE'],$persona['APELLIDOS'],$persona['CORREOELECTRONICO'],$persona['CONTRASENYA'],$persona['TELEFONO']));
        return $personasSinTelefono;
    }

    private function convertirArrayPersona(array $datosPersona):?Persona{
        if($datosPersona['TELEFONO'] == NULL){
                $datosPersona['TELEFONO'] = '';
        }
        return new Persona($datosPersona['DNI'],$datosPersona['NOMBRE'],$datosPersona['APELLIDOS'],$datosPersona['CORREOELECTRONICO'],
            $datosPersona['CONTRASENYA'],$datosPersona['TELEFONO']);
    }



}