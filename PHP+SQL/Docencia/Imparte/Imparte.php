<?php
include_once "../conexion.php";
class Imparte extends conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mostrar(){
        try {
            $mostrar = $this->conectar()->prepare("SELECT * FROM imparte");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function insertar($dni,$asignatura){
        try {
            $insert = $this->conectar()->prepare("INSERT INTO imparte VALUES(:dni,:asignatura)");
            $insert->bindParam(":dni",$dni);
            $insert->bindParam(":asignatura",$asignatura);
            $insert->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
    public function eliminar($dni){
        try {
            $delete = $this->conectar()->prepare("DELETE FROM imparte WHERE dni=:dni");
            $delete->bindParam(":dni",$dni);
            $delete->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}