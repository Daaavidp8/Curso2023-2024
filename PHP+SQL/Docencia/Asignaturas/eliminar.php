
<?php
include_once "Asignaturas.php";
try {
    $eliminar = new Asignaturas();
    $eliminar->eliminar($_REQUEST['codigo']);
    header('Location: ./mostrar.php');
}catch (Exception $e){
    die($e->getMessage());
}



?>
