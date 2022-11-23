<?php



use app\Personas\Persona;
use app\Personas\Jugador;
use Modelo\PersonaDAOMySQL;
use Vista\Personas\PersonaVista;
use Controlador\Persona\PersonaControlador;
use app\Router;
include __DIR__."/autoload.php";

$router = new Router();
$router->guardarRuta('get','/api/personas', [PersonaControlador::class,"mostrar"]);
$router->guardarRuta('post','/api/personas', [PersonaControlador::class,"guardar"]);
$router->guardarRuta('delete','/api/personas', [PersonaControlador::class,"borrar"]);
$router->guardarRuta('put','/api/personas', [PersonaControlador::class,"modificar"]);


$router->resolverRuta($_SERVER['REQUEST_URI'],$_SERVER['REQUEST_METHOD']);



//$vista = new PersonaVista("Cobra Padel");
//$index = $vista->getHtml()->generarEncabezado("Padel");
//echo $vista;

//$controlador = new PersonaControlador();
//$controlador->crear();
//$controlador->comprobarUsuarioWeb("ymoussaoui15@gmail.com","1234");


//echo $_SERVER['REQUEST_URI']."<br>";
//echo parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH);
//if((parse_url($_SERVER['REQUEST_URI'],PHP_URL_PATH))==='persona'){
//    $persona = new PersonaControlador();
//    $persona->crear();}



