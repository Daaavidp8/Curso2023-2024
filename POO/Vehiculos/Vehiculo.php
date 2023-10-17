<?php

class Vehiculo
{
    private $velocidad;

    public function __construct($fvelocidad = 1)
    {
        $this->setVelocidad($fvelocidad);
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function aumentarVelocidad($fnum)
    {
        $this->velocidad += $fnum;
    }


    public function disminuirVelocidad($fnum)
    {
        if ($fnum < $this->velocidad)
        {
            $this->velocidad -= $fnum;
        }
    }

    public function velocidadMaxima($fnum)
    {
        $this->setVelocidad($fnum);
    }
}

