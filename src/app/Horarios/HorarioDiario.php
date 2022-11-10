<?php

namespace app\Horarios;
use app\Horarios\Exceptions\HoraNoValidaException;
use app\Horarios\Intervalo;
include __DIR__."../../autoload.php";
include_once ("Intervalo.php");


class HorarioDiario
{
    private \DateTime $fecha;
    private float $horaApertura;
    private float $horaCierre;
    private int $duracionIntervalo;
    private array $intervalosDeDia;

    /**
     * @param \DateTime $fecha
     * @param float $horaApertura
     * @param float $horaCierre
     * @param int $duracionIntervalo
     * @param array $intervalosDeDia
     */
    public function __construct(\DateTime $fecha, float $horaApertura, float $horaCierre, int $duracionIntervalo, array $intervalosDeDia)
    {
        $this->fecha = $fecha;
        if($horaApertura<0 || $horaApertura>23){
            throw new HoraNoValidaException("Hora de apertura no válida");
        }
        if($horaCierre<0 || $horaCierre>23){
            throw new HoraNoValidaException("Hora de cierre no válida");
        }
        if($horaApertura>=$horaCierre){
            throw new HoraNoValidaException("Hora de apertura mayor que la de cierre");
        }
        if(Intervalo::calcularFinIntervalo($horaApertura,$duracionIntervalo) > $horaCierre){
            throw new HoraNoValidaException("Impossible crear un intervalo");
        }
        if($horaApertura-intval($horaApertura)>0.59){
            throw new HoraNoValidaException("Parte fraccionaria de la hora de apertura no válida");
        }
        if($horaApertura-intval($horaApertura)>0.59){
            throw new HoraNoValidaException("Parte fraccionaria de la hora de apertura no válida");
        }
        $this->horaApertura = $horaApertura;
        $this->horaCierre = $horaCierre;
        $this->duracionIntervalo = $duracionIntervalo;
        $this->intervalosDeDia = $intervalosDeDia;
    }

    /**
     * @return \DateTime
     */
    public function getFecha(): \DateTime
    {
        return $this->fecha;
    }

    /**
     * @param \DateTime $fecha
     * @return HorarioDiario
     */
    public function setFecha(\DateTime $fecha): HorarioDiario
    {
        $this->fecha = $fecha;
        return $this;
    }

    /**
     * @return float
     */
    public function getHoraApertura(): float
    {
        return $this->horaApertura;
    }

    /**
     * @param float $horaApertura
     * @return HorarioDiario
     */
    public function setHoraApertura(float $horaApertura): HorarioDiario
    {
        $this->horaApertura = $horaApertura;
        return $this;
    }

    /**
     * @return float
     */
    public function getHoraCierre(): float
    {
        return $this->horaCierre;
    }

    /**
     * @param float $horaCierre
     * @return HorarioDiario
     */
    public function setHoraCierre(float $horaCierre): HorarioDiario
    {
        $this->horaCierre = $horaCierre;
        return $this;
    }

    /**
     * @return int
     */
    public function getDuracionIntervalo(): int
    {
        return $this->duracionIntervalo;
    }

    /**
     * @param int $duracionIntervalo
     * @return HorarioDiario
     */
    public function setDuracionIntervalo(int $duracionIntervalo): HorarioDiario
    {
        $this->duracionIntervalo = $duracionIntervalo;
        return $this;
    }

    /**
     * @return array
     */
    public function getIntervalosDeDia(): array
    {
        return $this->intervalosDeDia;
    }

    /**
     * @param array $intervalosDeDia
     * @return HorarioDiario
     */
    public function setIntervalosDeDia(array $intervalosDeDia): HorarioDiario
    {
        $this->intervalosDeDia = $intervalosDeDia;
        return $this;
    }

    public function generarIntervalos():?HorarioDiario{

        $duracionH = $this->duracionIntervalo/60;
        $horarioTrabajo = $this->horaCierre-$this->horaApertura;
        $esReservado= false;
        /*      $duracion = $intervalo->getHoraFin()-$intervalo->getHoraInicio();

               if($intervalo->getHoraInicio() <$this->getHoraApertura() || $intervalo->getHoraFin() >$this->getHoraCierre() ){
                   echo "out of work time.";
               }
               else if($duracion !== $this->duracionIntervalo){
                   echo "please, respect the duration.";
               }
               else{*/
        for($i=0;$i<$horarioTrabajo/$duracionH;$i++){
            $this->intervalosDeDia[$i] = new Intervalo($this->horaApertura+($duracionH*$i),$this->horaApertura+($duracionH*($i+1)));
            if ($this->intervalosDeDia[$i]->getSocioReservado()!== null){
                $esReservado = true;
            }

       }






        return $this;
    }
    public function imprimirHorarioDiario():string{
        //TODO;
        return $this;
    }


}