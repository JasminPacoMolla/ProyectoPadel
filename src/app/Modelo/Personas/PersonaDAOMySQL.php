<?php

namespace app\Modelo\Personas;
use app\Personas\Persona;
use app\Modelo\Exceptions\ActualizarPersonasException;
use app\Modelo\Exceptions\PersonaNoEncontradaException;
use \PDO;

require_once __DIR__ . "/../../../datosConexionBD.php";
require_once __DIR__ . "/../../../datosConfiguracion.php";

class PersonaDAOMySQL extends PersonaDAO
{
    public function __construct(){
        //$this->setConexion(new PDO("mysql:host=".HOSTBD."; dbname=".NOMBREBD.,USUARIOBD,PASSBD));
        $this->setConexion(new PDO("mysql:host=db; dbname=padel","jasmin","12345"));

        $this->getConexion()->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }
    public function leerPersona(String $dni):?Persona{
        $query = "SELECT * FROM PERSONA WHERE DNI=?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1, $dni);
        $sentencia->execute();

        if(($fila = $sentencia->fetch())){
            if($fila['TELEFONO'] == null){
                return new Persona(
                    $fila['DNI'],
                    $fila['NOMBRE'],
                    $fila['APELLIDOS'],
                    $fila['CORREOELECTRONICO'],
                    $fila['CONTRASENYA']
                );
            }
            else{
                return new Persona(
                    $fila['DNI'],
                    $fila['NOMBRE'],
                    $fila['APELLIDOS'],
                    $fila['CORREOELECTRONICO'],
                    $fila['CONTRASENYA'],
                    $fila['TELEFONO']
                );
            }

        }else{
            throw new PersonaNoEncontradaException("La persona no existe en la base de datos");
        }
    }

    public function leerPersonaPorCorreo(string $correoElectronico):?Persona{
        $query = "SELECT * FROM PERSONA WHERE CORREOELECTRONICO=?";

        $sentencia= $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$correoElectronico);

        if($sentencia->execute()){
            $resultado = $sentencia->fetch();
            return $this->convertirArrayPersona($resultado);
        }else{
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
    public function modificarTodasLasPersona(array $elementosAmodificar){
        $query = "update PERSONA set ";

        if(isset($elementosAmodificar['nombre'])){
            $query.="NOMBRE=:nombre,";
        }
        if(isset($elementosAmodificar['apellidos'])){
            $query.="APELLIDOS=:apellidos,";

        }
        if(isset($elementosAmodificar['telefono'])){
            $query.="TELEFONO=:telefono,";

        }
        if(isset($elementosAmodificar['contrasenya'])){
            $query.="CONTRASENYA=:contrasenya,";

        }
        $query = substr($query,0,-1);
        $sentencia = $this->getConexion()->prepare($query);

        if(isset($elementosAmodificar['nombre'])){
            $sentencia->bindParam("nombre",$elementosAmodificar['nombre']);
        }
        if(isset($elementosAmodificar['apellidos'])){
            $sentencia->bindParam("apellidos",$elementosAmodificar['apellidos']);

        }
        if(isset($elementosAmodificar['telefono'])){
            $sentencia->bindParam("telefono",$elementosAmodificar['telefono']);

        }
        if(isset($elementosAmodificar['contrasenya'])){
            $pass = password_hash($elementosAmodificar['contrasenya'],PASSWORD_DEFAULT);
            $sentencia->bindParam("contrasenya",$pass);

        }

        try{
            $resultado = $sentencia->execute();

        }catch (\PDOException $e){
            throw new ActualizarPersonasException("no se puede actualizar");
        }





    }

    public function borrarPersonaPorDni($dni):?Persona {
        try{
            $persona = $this->leerPersona($dni);
        }catch(PersonaNoEncontradaException $e){
            throw new PersonaNoEncontradaException("No se puede borrar");
        }
        $query = "delete from PERSONA where DNI=?";
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
    public function borrarTodasLasPersonas():bool{
        $sentencia=$this->getConexion()->query("TRUNCATE PERSONA");
        return $sentencia->execute();

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


    public function existeDni($dni){
        $query = "SELECT * FROM PERSONA WHERE dni = ?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$dni);
        $sentencia->execute();

        if($sentencia->fetch()){
            return true;
        }
        else{
            return false;
        }
    }

    public function existeCorreo($correo){
        $query = "SELECT * FROM PERSONA WHERE correoelectronico = ?";
        $sentencia = $this->getConexion()->prepare($query);
        $sentencia->bindParam(1,$correo);
        $sentencia->execute();

        if($sentencia->fetch()){
            return true;
        }
        else{
            return false;
        }
    }



}