<?php
require_once 'profesores.php';
try {
    $profesores = new Profesores();
    $profesores->eliminar($_REQUEST['dni']);
    header('Location: ./mostrar.php');
}catch (Exception $e){
    die($e->getMessage());
}

?>
