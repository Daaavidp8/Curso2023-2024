<?php include "./inc/cabecera.inc";
?>
<?php include "./carta.php";

$carta = new Carta();
$numCartas = rand(5,10);
$major;
$menor;
for ($i = 0; $i < $numCartas; $i++){
    $valorCarta = $carta->getCarta();
    if($i === 0){
        $major = $valorCarta;
        $menor = $valorCarta;
    }elseif ($valorCarta > $major){
        $major = $valorCarta;
    }elseif ($valorCarta < $menor){
        $menor = $valorCarta;
    }
    echo '<img src="../imagenes/p' . $valorCarta . '.svg">';
    $carta->setCarta();
}
echo "<p>La carta mas alta es $major y la mas bajita es $menor <p/>";
?>
<?php include "./inc/pie.inc";
?>
