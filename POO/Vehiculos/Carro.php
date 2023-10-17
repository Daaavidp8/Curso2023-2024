<?php
include "./Terrestre.php";

class Carro extends Terrestre
{
    private $numPuertas,$encendido;

    public function __construct($fvelocidad,$numPuertas = 1,$encendido = false)
    {
        parent::__construct($fvelocidad);
        $this->setNumPuertas($numPuertas);
        $this->setEncendido($encendido);
    }

    public function getEncendido()
    {
        return $this->encendido;
    }

    public function setEncendido($encendido)
    {
        if ($encendido === true || $encendido === false){
            $this->encendido = $encendido;
        }
    }

    public function getNumPuertas()
    {
        return $this->numPuertas;
    }

    public function setNumPuertas($numPuertas)
    {
        if ($numPuertas > 0)
        {
            $this->numPuertas = $numPuertas;
        }

    }

    public function encenderOApagar(){
        $this->setEncendido(!$this->getEncendido());
    }
}
