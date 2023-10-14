<?php include "../cabecera.inc"
?>

<?php include "./Dado.php"
?>

<h1>Dado</h1>
<p>Actualize la página para mostrar una nueva tirada</p>
<?php
    $dado1 = new Dado();
    $random = rand(2,7);
    $valores = [];


    echo '<h1>Desordenado:</h1>';
    for ($i = 0; $i<$random; $i++){
        $valores[] = $dado1->getValor();
        echo '<img src="../imagenes/Ejercicios_Ludopatas-20231012/' . $dado1->getValor() . '.svg">';
        $dado1->setValor();
    }
    sort($valores);
    echo '<h1>Ordenado:</h1>';
    for ($i=0;$i<count($valores);$i++)
    {
        echo '<img src="../imagenes/Ejercicios_Ludopatas-20231012/' . $valores[$i] . '.svg">';
    }
?>

<?php include "../pie.inc"
?>
