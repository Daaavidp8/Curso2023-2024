<?php include "./cabecera.inc"
?>
<?php
    $erroredad = $_REQUEST['erroredad'];
    $errornombre = $_REQUEST['errornombre'];

    echo "<h1>Formulario</h1>";
    echo "<form action='persona.php' method='post'>";
echo '<p>';
    switch ($erroredad){
            case "vacio":
        echo "No puedes dejar la edad vacia<br><br>";
        break;

        case "notanumber":
        echo "No introduzcas texto en la edad<br><br>";
        break;

        case "incorrectnumber";
            echo "Introduce una edad mayor de 18 y menor de 130<br><br>";
        break;
    }
echo '</p>';
    echo '<p>';

    switch ($errornombre){
        case "vacio":
            echo "No puedes dejar el nombre vacio<br><br>";
            break;

        case "isanumber":
            echo "El nombre tiene que ser texto<br><br>";
            break;
    }
echo '</p>';

    echo "<label>Escriba su edad(entre 18 y 130 años):";
    echo    "<input type='text' name='edad'></label>";
    echo    "<br>";
    echo "<label>Escriba su Nombre:";
    echo    "<input type='text' name='nombre'></label>";
    echo    "<br>";

    echo    "<input type='submit' value='Comprobar'>";
    echo    "<input type='reset' value='Borrar'>";

    echo "</form>";
    ?>
<?php include "../../pie.inc"
?>
