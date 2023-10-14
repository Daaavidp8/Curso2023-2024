<?php

class Dado
{
    private $valor;

    public function __construct()
    {
        $this->setValor();
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor()
    {
        $this->valor = rand(1,6);
    }


}