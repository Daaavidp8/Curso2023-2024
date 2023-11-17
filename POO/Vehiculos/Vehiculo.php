<?php

class Vehiculo
{
    private $velocidad;
    private $marca;
    private $modelo;


    public function __construct($fvelocidad,$fmarca,$fmodelo = "")
    {
        $this->setVelocidad($fvelocidad);
        $this->setMarca($fmarca);
        $this->setModelo($fmodelo);
    }

    public function getVelocidad()
    {
        return $this->velocidad;
    }

    public function setVelocidad($velocidad)
    {
        $this->velocidad = $velocidad;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function getModelo()
    {
        return $this->modelo;
    }

    public function setModelo($modelo)
    {
        $this->modelo = $modelo;
    }

    public function aumentarVelocidad($fnum)
    {
        $this->setVelocidad($this->getVelocidad() + $fnum);
    }


    public function disminuirVelocidad($fnum)
    {
        if ($fnum < $this->velocidad)
        {
            $this->setVelocidad($this->getVelocidad() - $fnum);
        }
    }

    public function velocidadMaxima($fvaribleVelocidad)
    {
            return "<p>El " . $this->getMarca() . " " . $this->getModelo() .  " corriendo a " .
                ($this->getVelocidad()) . " KM " . ($fvaribleVelocidad ? "(disminuyendo velocidad)" : "(aumentando velocidad)") . "</p>";

    }
}

