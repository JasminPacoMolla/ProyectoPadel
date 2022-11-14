<?php

require_once __DIR__."/autoload.php";

use app\Personas\Persona;
use app\Personas\Jugador;
use Modelo\PersonaDAOMySQL;
use Vista\Personas\PersonaVista;


  /*  if($personaDAO->getConexion()){
    echo "it works !!!!";
    }
    else{
    echo "ERROR";
    }*/

//$persona = new Persona("11111111","yasmin","moussaoui","ymoussaoui15@gmail.com","1111111");
//var_dump($persona);
//$resultado1 = $personaDAO->insertarPersona($persona);
$vista = new PersonaVista("Cobra Padel");
//$index = $vista->getHtml()->generarEncabezado("Padel");
//echo $vista->getHtml()->generarFooter();

//$modificacion = $personaDAO->modificarPersona($persona);

//$miDni = $personaDAO->leerPersona("34371722Q");
//var_dump($miDni);

//$array = $personaDAO->leerTodasLasPersonas();
//$resultado = $personaDAO->obtenerRangoPersonas(2,1);
//$resultado = $personaDAO->obtenerPersonaPorNombre("jas");

//var_dump($resultado);
//var_dump($array);

echo $vista;