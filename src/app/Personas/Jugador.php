<?php

namespace app\Personas;

use app\Personas\Entrenador;
use app\Personas\Fisioterapeuta;
use app\Personas\HorarioMensual;
use app\Personas\LadoPreferido;
use app\Personas\ManoHabil;
use app\Personas\Persona;
include __DIR__."../../autoload.php";

class Jugador extends Persona
{
    private int $nivelJuego;
    private ManoHabil $manoHabil;
    private LadoPreferido $ladoPreferido;
    private int $indiceDeIrresponsabilidad=0;
    private int $numFederado;
    private HorarioMensual$horarioMensualPreferido;
    private bool $renovacionAutomaticaHorario;
    private Entrenador$entrenadorAsociado;
    private Fisioterapeuta $fisioAsociado;
    private bool $partidasMixtas;
    private int $socio;
    private \DateTime $fechaAltaSocio;

    /**
     * @param $nivelJuego
     * @param $manoHabil
     * @param $ladoPreferido
     */
    public function __construct(string $dni,string $nombre,string $apellidos,string $correoElectronico,string $contrasenya,
        int $nivelJuego,ManoHabil $manoHabil,LadoPreferido $ladoPreferido,string $telefono = null)
    {
        parent::__construct($dni,$nombre,$apellidos,$correoElectronico,$contrasenya,$telefono);
        $this->nivelJuego = $nivelJuego;
        $this->manoHabil = $manoHabil;
        $this->ladoPreferido = $ladoPreferido;
    }

    /**
     * @return int
     */
    public function getNivelJuego(): int
    {
        return $this->nivelJuego;
    }

    /**
     * @param int $nivelJuego
     * @return Jugador
     */
    public function setNivelJuego(int $nivelJuego): Jugador
    {
        $this->nivelJuego = $nivelJuego;
        return $this;
    }

    /**
     * @return ManoHabil
     */
    public function getManoHabil(): ManoHabil
    {
        return $this->manoHabil;
    }

    /**
     * @param ManoHabil $manoHabil
     * @return Jugador
     */
    public function setManoHabil(ManoHabil $manoHabil): Jugador
    {
        $this->manoHabil = $manoHabil;
        return $this;
    }

    /**
     * @return LadoPreferido
     */
    public function getLadoPreferido(): LadoPreferido
    {
        return $this->ladoPreferido;
    }

    /**
     * @param LadoPreferido $ladoPreferido
     * @return Jugador
     */
    public function setLadoPreferido(LadoPreferido $ladoPreferido): Jugador
    {
        $this->ladoPreferido = $ladoPreferido;
        return $this;
    }

    /**
     * @return int
     */
    public function getIndiceDeIrresponsabilidad(): int
    {
        return $this->indiceDeIrresponsabilidad;
    }

    /**
     * @param int $indiceDeIrresponsabilidad
     * @return Jugador
     */
    public function setIndiceDeIrresponsabilidad(int $indiceDeIrresponsabilidad): Jugador
    {
        $this->indiceDeIrresponsabilidad = $indiceDeIrresponsabilidad;
        return $this;
    }

    /**
     * @return int
     */
    public function getNumFederado(): int
    {
        return $this->numFederado;
    }

    /**
     * @param int $numFederado
     * @return Jugador
     */
    public function setNumFederado(int $numFederado): Jugador
    {
        $this->numFederado = $numFederado;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRenovacionAutomaticaHorario(): bool
    {
        return $this->renovacionAutomaticaHorario;
    }

    /**
     * @param bool $renovacionAutomaticaHorario
     * @return Jugador
     */
    public function setRenovacionAutomaticaHorario(bool $renovacionAutomaticaHorario): Jugador
    {
        $this->renovacionAutomaticaHorario = $renovacionAutomaticaHorario;
        return $this;
    }

    /**
     * @return Entrenador
     */
    public function getEntrenadorAsociado(): Entrenador
    {
        return $this->entrenadorAsociado;
    }

    /**
     * @param Entrenador $entrenadorAsociado
     * @return Jugador
     */
    public function setEntrenadorAsociado(Entrenador $entrenadorAsociado): Jugador
    {
        $this->entrenadorAsociado = $entrenadorAsociado;
        return $this;
    }

    /**
     * @return int
     */
    public function getSocio(): int
    {
        return $this->socio;
    }


    /**
     * @param mixed $socio
     * @return Jugador
     */
    public function setSocio($socio)
    {
        $this->socio = $socio;
        return $this;
    }
   /**
     * @return mixed
     */

    /**
     * @return Fisioterapeuta
     */
    public function getFisioAsociado(): Fisioterapeuta
    {
        return $this->fisioAsociado;
    }

    /**
     * @param Fisioterapeuta $fisioAsociado
     * @return Jugador
     */
    public function setFisioAsociado(Fisioterapeuta $fisioAsociado): Jugador
    {
        $this->fisioAsociado = $fisioAsociado;
        return $this;
    }

    /**
     * @return bool
     */
    public function isPartidasMixtas(): bool
    {
        return $this->partidasMixtas;
    }

    /**
     * @param bool $partidasMixtas
     * @return Jugador
     */
    public function setPartidasMixtas(bool $partidasMixtas): Jugador
    {
        $this->partidasMixtas = $partidasMixtas;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getFecahaAltaSocio(): \DateTime
    {
        return $this->fechaAltaSocio;
    }

    /**
     * @param \DateTime $fecahaAltaSocio
     * @return Jugador
     */
    public function setFecahaAltaSocio(\DateTime $fechaAltaSocio): Jugador
    {
        $this->fechaAltaSocio = $fechaAltaSocio;
        return $this;
    }

    public function altaSocio(){
        //TODO buscar el siguiente número de socio en la base de datos
        $this->fechaAltaSocio = new \DateTime();
    }




    public  function getHorarioMensualPreferido():HorarioMensual
    {
        return $this->horarioMensualPreferido;
    }
    public function generarHorarioPreferido(bool $renovacion):Jugador{
        //TODO
        return $this;
    }

}