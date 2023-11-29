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
            $insertar = $this->conectar()->prepare("INSERT INTO asignaturas" .
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

    public function eliminar($codigo)
    {
        try {
            $eliminar = $this->conectar()->prepare("DELETE FROM asignaturas WHERE codigo=:codigo");
            $eliminar->bindParam(':codigo', $codigo);
            $eliminar->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }

    }

    public function modificar($codigo,$descripcion,$creditos,$creditosp)
    {
        try {
            $modificar = $this->conectar()->prepare("UPDATE asignaturas SET descripcion = :descripcion,creditos = :creditos,creditosp = :creditosp WHERE codigo = :codigo");
            $modificar->bindParam(':codigo', $codigo);
            $modificar->bindParam(':descripcion',$descripcion);
            $modificar->bindParam(':creditos',$creditos);
            $modificar->bindParam(':creditosp',$creditosp);
            $modificar->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }

    }
}