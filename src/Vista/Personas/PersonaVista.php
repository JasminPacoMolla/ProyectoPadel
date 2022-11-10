<?php

namespace Vista\Personas;

use app\Personas\Persona;
use Vista\Plantilla\Plantilla;

class PersonaVista
{
private Plantilla $html;

    /**
     * @param Plantilla $html
     */
    public function __construct(string $titulo)
    {
        $this->html = new Plantilla("Datos Personales");
    }
    public function imprimirDatosDePersona(Persona $persona):string{
        $this->html->generarTodaLaPagina();
    }


}