<?php
include "./Vehiculo.php";
class Terrestre extends Vehiculo
{
    public function __construct($fvelocidad)
    {
        parent::__construct($fvelocidad);
    }

    public function pasarBache()
    {
        echo "Has pasado un bache";
    }

    public function frenar()
    {
        $this->setVelocidad(0);
    }
}