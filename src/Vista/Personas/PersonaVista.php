<?php

namespace Vista\Personas;

use app\Personas\Persona;
use Vista\Plantillas\Plantilla;

class PersonaVista
{
private Plantilla $html;

    /**
     * @param Plantilla $html
     */
    public function __construct(string $titulo)
    {
        $this->html = new Plantilla($titulo);
    }
    public function imprimirDatosDePersona(Persona $persona):string{
       return $this->html->generarTodaLaPagina();
    }

    /**
     * @return Plantilla
     */
    public function getHtml(): Plantilla
    {
        return $this->html;
    }

    /**
     * @param Plantilla $html
     * @return PersonaVista
     */
    public function setHtml(Plantilla $html): PersonaVista
    {
        $this->html = $html;
        return $this;
    }
    public function __toString():string{
      return  $this->html->generarTodaLaPagina();
    }


}