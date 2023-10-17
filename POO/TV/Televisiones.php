<?php include "../include/cabecera.inc";
include "./TV.php";
?>

<?php

    $tele1 = new TV("Panasonic");
    $tele1->setVolumen(150);
    $tele1->setCanal(60);
    $tele1->Mostrar();
    $tele1->setVolumen(-150);
    $tele1->setCanal(50);
    $tele1->Mostrar();
    $tele1->setVolumen(70);
    $tele1->setCanal(25);
    $tele1->Mostrar();
?>

<?php include "../include/pie.inc";
?>
