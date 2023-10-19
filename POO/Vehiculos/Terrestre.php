<?php
include_once "./Vehiculo.php";
class Terrestre extends Vehiculo
{
    public function __construct($fvelocidad,$fmarca,$fmodelo)
    {
        parent::__construct($fvelocidad,$fmarca,$fmodelo);
    }

    public function pasarBache()
    {
        return "Has pasado un bache";
    }

    public function frenar()
    {
        $this->setVelocidad(0);
    }
}