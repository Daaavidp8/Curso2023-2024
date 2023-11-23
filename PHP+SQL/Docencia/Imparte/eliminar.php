<?php
include_once "./Imparte.php";
try {
    $delete = new Imparte();
    $delete->eliminar($_REQUEST['dni']);
    header('Location: ./mostrar.php?mensaje=insertado');
}catch (Exception $e){
    die($e->getMessage());
}
?>
