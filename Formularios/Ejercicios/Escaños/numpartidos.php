<?php include "./cabecera.inc" ?>

<form action="./eleccionpartidos.php" method="post">

    <label for="numeropartidos">Numero de Partidos:</label>
    <input type="number" name="numeropartidos" id="numeropartidos"/><br><br>

    <label for="numeroescanos">Numero de Escaños:</label>
    <input type="number" name="numeroescanos" id="numeroescanos"/>
    <br><br>

    <input type="submit" value="Enviar">
</form>
<?php

?>



<?php include "./pie.inc" ?>
