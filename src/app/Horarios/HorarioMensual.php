<?php

namespace app\Horarios;

class HorarioMensual
{
    private int $mes;
    private int $hora;
    private HorarioDiario $horariosDiarios;

    /**
     * @param int $mes
     * @param int $hora
     * @param HorarioDiario $horariosDiarios
     */
    public function __construct(int $mes, int $hora, HorarioDiario $horariosDiarios)
    {
        $this->mes = $mes;
        $this->hora = $hora;
        $this->horariosDiarios = $horariosDiarios;
    }

    /**
     * @return int
     */
    public function getMes(): int
    {
        return $this->mes;
    }

    /**
     * @param int $mes
     * @return HorarioMensual
     */
    public function setMes(int $mes): HorarioMensual
    {
        $this->mes = $mes;
        return $this;
    }

    /**
     * @return int
     */
    public function getHora(): int
    {
        return $this->hora;
    }

    /**
     * @param int $hora
     * @return HorarioMensual
     */
    public function setHora(int $hora): HorarioMensual
    {
        $this->hora = $hora;
        return $this;
    }

    /**
     * @return HorarioDiario
     */
    public function getHorariosDiarios(): HorarioDiario
    {
        return $this->horariosDiarios;
    }

    /**
     * @param HorarioDiario $horariosDiarios
     * @return HorarioMensual
     */
    public function setHorariosDiarios(HorarioDiario $horariosDiarios): HorarioMensual
    {
        $this->horariosDiarios = $horariosDiarios;
        return $this;
    }




    public function generarHorarios(): ?HorarioMensual{
        //TODO
        return $this;
    }
    public function calcularNumHoras():int{
        //TODO
        return 0;
    }
}






