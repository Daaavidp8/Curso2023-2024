<?php
 include_once "Asignaturas.php";


if (isset($_REQUEST['codigo'])){
    try {
        $insert = new Asignaturas();
        $insert->insertar(strtoupper($_REQUEST["codigo"]),strtoupper($_REQUEST["descripcion"]),$_REQUEST["creditos"],$_REQUEST["creditosp"]);
        header('Location: ./mostrar.php?mensaje=insertado');
    }catch (Exception $e){
        die($e->getMessage());
    }
}


?>
