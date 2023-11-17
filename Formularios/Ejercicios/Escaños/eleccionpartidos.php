<?php include "./cabecera.inc" ?>


<?php
$numeroPartidos = $_REQUEST['numeropartidos'];
$numeroEscanos = $_REQUEST['numeroescanos'];

echo "<form action='./calculoescanos.php' method='post'>";
for ($i = 0;$i < $numeroPartidos;$i++){
    echo "<label for='partidos[]'>Nombre del partido " . $i + 1 . "</label>";
    echo "<input type='text' name='partidos[]'/>";
    echo "<label for='votos[]'>Votos del partido " . $i + 1 . "</label>";
    echo "<input type='number' name='votos[]' id='votos[]'/><br>";
}
echo "<input type='hidden' value='$numeroEscanos' name='numeroescanos'>";
echo "<input type='hidden' value='$numeroPartidos' name='numeropartidos'>";
echo "<br><input type='submit' value='Enviar'>";

echo '</form>';
?>





<?php include "./pie.inc" ?>
