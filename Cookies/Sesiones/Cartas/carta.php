<?php


class Carta
{
    private $carta;
    public function __construct(){
        $this->setCarta();
    }

    public function getCarta()
    {
        return $this->carta;
    }

    public function setCarta()
    {
        $this->carta = rand(1,13);
    }
}