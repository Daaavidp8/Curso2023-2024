<?php
include "./Terrestre.php";
class Bicicleta extends Terrestre
{
    private $pedaleando;

    public function __construct($fvelocidad)
    {
        parent::__construct($fvelocidad);
    }
    public function empezarApedalear()
    {

    }
}