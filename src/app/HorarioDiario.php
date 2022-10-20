<?php

namespace app;

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
        //TODO
        return $this;
    }
    public function imprimirHorarioDiario():string{
        //TODO;
        return $this;
    }


}