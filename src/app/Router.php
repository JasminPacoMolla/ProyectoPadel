<?php

namespace app;
use app\Exceptions\RutaNoEncontradaException;


class Router
{
    private array $rutas;


    public function guardarRuta(string $ruta,callable|array $accion){
        $this->rutas[$ruta]=$accion;
        return $this;
    }

    public function resolverRuta($ruta){
        $rutaFiltrada = parse_url($ruta,PHP_URL_PATH);
        $accion = $this->rutas[$rutaFiltrada] ?? null;
        if($accion === null){
            throw new RutaNoEncontradaException();
        }else{
            if(is_callable($accion)) {
                return call_user_func($accion);
            }
            if(is_array($accion)){
                [$clase,$metodo]=$accion;
                /*$accion[0] = $clase
                $accion[1] = $metodo*/
                if(class_exists($clase)){
                    $clase = new $clase;
                    if(method_exists($clase,$metodo)){
                        return call_user_func_array([$clase,$metodo],[]);
                    }
                }
            }
        }
        throw new \RutaNoEncontradaException("Invalid parameter");


    }

}