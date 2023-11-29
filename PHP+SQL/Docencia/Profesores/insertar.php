<?php
require_once 'profesores.php';
try {
    $profesores = new Profesores();
    $profesores->insertar($_REQUEST['dni'],strtoupper($_REQUEST['nombre']),strtoupper($_REQUEST['categoria']),$_REQUEST['ingreso']);
    header('Location: ./mostrar.php?mensaje=insertado');
}catch(Exception $e){
    die($e->getMessage());
}

?>
