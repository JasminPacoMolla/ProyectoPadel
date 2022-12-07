<?php
namespace app\Modelo\Horarios;

class ModeloIntervalo
{
    private \PDO $conexion;


    public function __construct()
    {
        $this->conexion(new PDO("mysql:host=db; dbname=padel","jasmin","12345"));
        $this->conexion()->setAttribute(\PDO::ATTR_ERRMODE,\PDO::ERRMODE_EXCEPTION);
    }

    public function insertarIntervalo(Intervalo $intervalo):?Intervalo{
        $query = 'Insert into () intervaloDia   ';




        return null;
    }
}