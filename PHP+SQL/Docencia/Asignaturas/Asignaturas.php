<?php
require_once '../conexion.php';
class Asignaturas extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mostrar()
    {
        try {
            $mostrar = $this->conectar()->prepare("SELECT * FROM asignaturas");
            $mostrar->execute();
            return $mostrar->fetchAll();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function insertar($codigo,$descripcion,$creditos,$creditosp)
    {
        try {
            $insertar = $this->conectar()->prepare("INSERT INTO asignaturas(codigo,descripcion,creditos,creditosp)" .
                " VALUES(:codigo, :descripcion, :creditos, :creditosp)");
            $insertar->bindParam(':codigo', $codigo);
            $insertar->bindParam(':descripcion',$descripcion);
            $insertar->bindParam(':creditos',$creditos);
            $insertar->bindParam(':creditosp',$creditosp);
            $insertar->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminar()
    {

    }

    public function modificar()
    {

    }
}