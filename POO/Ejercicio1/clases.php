<?php include "../include/cabecera.inc"
?>

<?php
include "./Persona.php";
include "./Estudiante.php";
$persona1 = new Estudiante("03155758C","David","Picazodavid4@gmail.com",15,56780);
$persona1->Mostrar();
?>

<?php include "../include/pie.inc"
?>

