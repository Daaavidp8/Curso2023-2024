<?php

class TV
{
    private $marca;
    private $canal;
    private $volumen;

 public function __construct($fmarca)
 {
     $this->setMarca($fmarca);
     $this->Reiniciar();
 }

    public function getVolumen()
    {
        return $this->volumen;
    }

    public function setVolumen($volumen)
    {
        if ($volumen >= 0 && $volumen < 101){
            $this->volumen = $volumen;
        }elseif ($volumen < 0){
            $this->volumen = 0;
        }else{
            $this->volumen = 100;
        }
    }

    public function getCanal()
    {
        return $this->canal;
    }

    public function setCanal($canal)
    {
        if ($canal > 0 && $canal <= 50){
            $this->canal = $canal;
        }
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;
    }

    public function BajarVolumen(){
        $this->setVolumen($this->getVolumen() - 1);
    }

    public function SubirVolumen(){
        $this->setVolumen($this->getVolumen() + 1);
    }

    public function Reiniciar(){
        $this->volumen = 50;
        $this->canal = 1;
    }

    public function Mostrar(){
     echo "<p>" . $this->getMarca() ." en el canal " . $this->getCanal() . ",volumen " . $this->getVolumen() . "</p>";
    }

}