<?php


use app\Controlador\Persona\PersonaControlador;
use app\Modelo\Personas\PersonaDAOMongoDb;
use app\Personas\Persona;
use app\Router;
use app\Modelo\PersonaDAOMySQL;
use app\Vista\Personas\PersonaVista;
use app\Vista\LandingVista;
use app\Vista\LoginVista;

include __DIR__."/vendor/autoload.php";

$mongodb = new PersonaDAOMongoDb();
//$persona = $mongodb->leerTodasLasPersonas();
$persona2 = new Persona("012345", "MOM","msw","FAFI@GMAIL","0000");
$elementos = ["NOMBRE"=>"YASMIN"];
$mongodb->modificarTodasLasPersonas($elementos);





$router = new Router();
$router->guardarRuta('get','/',[LandingVista::class,"mostrarPagina"]);
$router->guardarRuta('get','/login',[LoginVista::class,"mostrarLogin"]);
$router->guardarRuta('post','/logear',[PersonaControlador::class,"recibirDatosLogin"]);
$router->guardarRuta('get','/api/persona',[PersonaControlador::class,"mostrar"]);
$router->guardarRuta('post','/api/persona',[PersonaControlador::class,"guardar"]);
$router->guardarRuta('delete','/api/persona',[PersonaControlador::class,"borrar"]);
$router->guardarRuta('put','/api/persona',[PersonaControlador::class,"modificar"]);

//$router->resolverRuta($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);



//$vista = new PersonaVista("Cobra Padel");
//$index = $vista->getHtml()->generarEncabezado("Padel");

//$controlador = new PersonaControlador();
//$controlador->crear();
//$controlador->comprobarUsuarioWeb("ymoussaoui15@gmail.com","1234");


//echo $_SERVER['REQUEST_URI']."<br>";
//echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
//if((parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH))==='persona'){
//    $persona = new PersonaControlador();
//    $persona->crear();}



