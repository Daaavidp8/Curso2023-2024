
<?php
ini_set("display_errors",1);
include_once "./Imparte.php";
try {
    $insert = new Imparte();
    $insert->insertar($_REQUEST['dni'],$_REQUEST['asignatura']);
    echo "inserta";
    header('Location: ./mostrar.php?mensaje=insertado');
}catch (Exception $e){
    die($e->getMessage());
}
?>
