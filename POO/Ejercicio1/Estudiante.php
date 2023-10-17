<?php

class Estudiante extends Persona
{
    private $numExpediente;

    public function __construct($fdni, $fnombre, $femail, $fedad,$fnumExp)
    {
        parent::__construct($fdni, $fnombre, $femail, $fedad);
        $this->setNumExpediente($fnumExp);
    }

    public function getNumExpediente()
    {
        return $this->numExpediente;
    }

    public function setNumExpediente($numExpediente)
    {
        $this->numExpediente = $numExpediente;
    }

    public function Mostrar() {
        echo "<p>-Nombre: "  . $this->getNombre() . "</p>";
        echo "<p>-DNI: "  . $this->getDni() . "</p>";
        echo "<p>-Email: "  . $this->getEmail() . "</p>";
        echo "<p>-Edad: "  . $this->getEdad() . "</p>";
        echo "<p>-Mayor de edad: "  . ($this->getMajoredad() ? 'Si':'No') . "</p>";
        echo "<p>-Num Exp: "  . $this->getNumExpediente() . "</p>";

    }
}