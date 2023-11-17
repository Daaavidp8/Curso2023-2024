<?php include "./cabecera.inc"?>
<?php
$color = $_COOKIE['colorusu'];
$nombre = $_COOKIE['nombreusu'];
if (isset($color) && isset($nombre)){
    echo "<body style='background-color: $color;'>";
    echo "<h1>Benvenido $nombre</h1>";
}else{
    echo "<h1>Pagina de inicio</h1>";
    echo "<a href='./preferencias.php'>Preferencias</a>";
}

?>
<?php include "../../pie.inc";
?>
