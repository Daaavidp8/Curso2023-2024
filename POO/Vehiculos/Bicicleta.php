<?php
include_once "./Terrestre.php";
class Bicicleta extends Terrestre
{
    private $pedaleando;

    public function __construct($fvelocidad,$fmarca,$fmodelo,$fpedaleando)
    {
        parent::__construct($fvelocidad,$fmarca,$fmodelo);
        $this->setPedaleando($fpedaleando);

    }
    public function getPedaleando()
    {
        return $this->pedaleando;
    }

    public function setPedaleando($pedaleando)
    {
        if ($pedaleando === true || $pedaleando === false)
        {
            $this->pedaleando = $pedaleando;
        }
    }

    public function empezarApedalear()
    {
        $this->setPedaleando(true);
    }

    public function dejarDepedalear()
    {
        $this->setPedaleando(false);
    }

}