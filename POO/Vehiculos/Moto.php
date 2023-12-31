
<?php
include_once "./Terrestre.php";

class Moto extends Terrestre
{
    private $numPuertas,$encendido;

    public function __construct($fvelocidad,$fmarca,$fmodelo,$encendido = false,$numPuertas = 1)
    {
        parent::__construct($fvelocidad,$fmarca,$fmodelo);
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

    public function apagar(){
        $this->setEncendido(false);
    }

    public function encender(){
        $this->setEncendido(true);
    }
}
