<?php
require_once '../conexion.php';

class Profesores extends Conexion
{
    public function __construct()
    {
        parent::__construct();
    }

    public function mostrar()
    {
        try{
            $resultado = $this->conectar()->prepare("SELECT * FROM profesores");
            $resultado->execute();
            return $resultado->fetchAll();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function insertar($dni,$nombre,$categoria,$ingreso)
    {
        try{
            $resultado = $this->conectar()->prepare("INSERT INTO profesores VALUES( ?, ?, ?, ?)");
            $parametros = [$dni,$nombre,$categoria,$ingreso];
            for ($i=0;$i<count($parametros);$i++){
                $resultado->bindParam($i + 1,$parametros[$i]);
            }
            $resultado->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function eliminar($dni)
    {
        try{
            $resultado = $this->conectar()->prepare("DELETE FROM profesores WHERE dni = :dni");
            $resultado->bindParam(":dni",$dni);
            $resultado->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }

    public function modificar($dninuevo,$nombre,$categoria,$ingreso,$dniantiguo)
    {
        try{
            $resultado = $this->conectar()->prepare("UPDATE profesores SET dni = :dninuevo, nombre = :nombre,categoria = :categoria,ingreso = :ingreso WHERE dni = :dniantiguo ");
            $resultado->bindParam(":dninuevo",$dninuevo);
            $resultado->bindParam(":nombre",$nombre);
            $resultado->bindParam(":categoria",$categoria);
            $resultado->bindParam(":ingreso",$ingreso);
            $resultado->bindParam(":dniantiguo",$dniantiguo);
            $resultado->execute();
        }catch (Exception $e){
            die($e->getMessage());
        }
    }
}