<?php

class Menu
{
    private $enlace;
    private $nombre;
    private $saltoLinea;

    public function __construct($fnombre,$fenlace,$fsaltoLinea)
    {
        $this->setNombre($fnombre);
        $this->setEnlace($fenlace);
        $this->setSaltoLinea($fsaltoLinea);
    }

    public function getEnlace()
    {
        return $this->enlace;
    }

    public function setEnlace($enlace)
    {
        $this->enlace = $enlace;
    }

    public function getNombre()
    {
        return $this->nombre;
    }


    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getSaltoLinea()
    {
        return $this->saltoLinea;
    }
    public function setSaltoLinea($saltoLinea)
    {
        $this->saltoLinea = $saltoLinea;
    }
}