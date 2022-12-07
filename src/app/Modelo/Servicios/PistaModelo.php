<?php

namespace app\Modelo\Servicios;

use app\Servicios\Pista;

class PistaModelo
{

    /*
     * CREATE TABLE PISTA (
			idPista int PRIMARY KEY,
            precio float,
            luz VARCHAR(20),
            precioLuz float,
            cubierta varchar(20),
            tipoPista varchar(20),
            reservaPistaMensual varchar(70),
            disponible varchar(20),
     		FOREIGN KEY (reservaPistaMensual) REFERENCES HorarioMensual(id)
);

CREATE TABLE horarioMensual (
			id int PRIMARY KEY AUTO_INCREMENT,
            mes int,
    		hora int,
    		horarioDiario int,
      		FOREIGN KEY (horarioDiario) REFERENCES HorarioDiario(id)
 );

CREATE TABLE horarioDiario (
	id int AUTO_INCREMENT PRIMARY KEY,
    fecha date ,
    horaApertura float,
    horaCierre float,
    duracionIntervalo int,

 );


CREATE TABLE intervaloDia (
			id int AUTO_INCREMENT PRIMARY KEY,
    		inicioIntervalo int,
    		finIntervalo int,
    		idHorario INT,
        	FOREIGN KEY (idHorario) REFERENCES horarioDiario(id)
 );
     *
     *
     * */

    public function insertarPista(Pista $pista): ?Pista
    {
        return null;

    }

    public function modificarPista(Pista $pista): ?Pista
    {
        // TODO: Implement modificarPista() method.
        return null;

    }

    public function borrarPista(Pista $pista): ?Pista
    {
        // TODO: Implement borrarPista() method.
        return null;

    }

    public function borrarPistaPorId(int $idPista): ?Pista
    {
        // TODO: Implement borrarPistaPorId() method.
        return null;

    }

    public function leerPista(int $idPista): ?Pista
    {
        // TODO: Implement leerPista() method.
        return null;

    }

    public function leerTodasLasPistas(): ?array
    {
        // TODO: Implement leerTodasLasPistas() method.
        return null;

    }
}