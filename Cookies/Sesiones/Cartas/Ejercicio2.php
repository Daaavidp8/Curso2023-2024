<?php include "./inc/cabecera.inc";
?>
<?php include "./carta.php";

$carta = new Carta();
$numCartas = rand(5,10);
$numeros = [];
for ($i = 0; $i < $numCartas; $i++){
    $valorCarta = $carta->getCarta();
    $numeros[] = $valorCarta;
    echo '<img src="../imagenes/p' . $valorCarta . '.svg">';
    $carta->setCarta();
}
sort($numeros);
$major = $numeros[count($numeros)-1];
echo "<p>La carta mas alta es $major<p/>";
echo "<h1>Carta a eliminar: <h1/>";
echo '<img src="../imagenes/p' . $major . '.svg"><br/>';
echo "<h1>Cartas restantes: <h1/>";
while ($major === $numeros[count($numeros)-1]){
    unset($numeros[count($numeros)-1]);
}
foreach ($numeros as $num){
    echo '<img src="../imagenes/p' . $num . '.svg">';
}
?>
<?php include "./inc/pie.inc";
?>

