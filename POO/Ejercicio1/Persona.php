<?php

class Persona
{
    private $dni;
    private $nombre;
    private $email;
    private $edad;
    private $majoredad;

    public function __construct($fdni,$fnombre,$femail,$fedad)
    {
        $this->setDni($fdni);
        $this->setEmail($femail);
        $this->setNombre($fnombre);
        $this->setEdad($fedad);
        $this->setMajoredad($fedad);
    }

    public function getDni()
    {
        return $this->dni;
    }

    public function setDni($dni)
    {
        $this->dni = $dni;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEdad()
    {
        return $this->edad;
    }

    public function setEdad($edad)
    {
        $this->edad = $edad;
    }

    public function getMajoredad()
    {
        return $this->majoredad;
    }

    public function setMajoredad($majoredad)
    {
        $this->majoredad = $majoredad >= 18;
    }

    public function Mostrar(){
        echo "<p>-Nombre: "  . $this->getNombre() . "</p>";
        echo "<p>-DNI: "  . $this->getDni() . "</p>";
        echo "<p>-Email: "  . $this->getEmail() . "</p>";
        echo "<p>-Edad: "  . $this->getEdad() . "</p>";
        echo "<p>-Mayor de edad: "  . ($this->getMajoredad() ? 'Si':'No') . "</p>";
    }
}