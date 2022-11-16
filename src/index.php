<?php



use app\Personas\Persona;
use app\Personas\Jugador;
use Modelo\PersonaDAOMySQL;
use Vista\Personas\PersonaVista;
use Controlador\Persona\PersonaControlador;
use app\Router;
include __DIR__."/autoload.php";

$router = new Router();
$router->guardarRuta('/',function (){echo "estoy en el index";});
$router->guardarRuta('/persona', [PersonaControlador::class,"login"]);

$router->resolverRuta($_SERVER['REQUEST_URI']);



$vista = new PersonaVista("Cobra Padel");
//$index = $vista->getHtml()->generarEncabezado("Padel");
//echo $vista;

$controlador = new PersonaControlador();
//$controlador->crear();
$controlador->comprobarUsuarioWeb("ymoussaoui15@gmail.com","1234");


//echo $_SERVER['REQUEST_URI']."<br>";
//echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
//if((parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH))==='persona'){
//    $persona = new PersonaControlador();
//    $persona->crear();}



