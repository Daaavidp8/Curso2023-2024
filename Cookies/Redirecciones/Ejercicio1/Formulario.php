<?php include "../../cabecera.inc"
?>
<?php
    $error = $_REQUEST['error'];
    echo "<h1>Formulario</h1>";
    echo "<form action='Edad.php' method='post'>";
    switch ($error){
        case "vacio":
            echo "No puedes dejar el campo vacio<br>";
            break;

        case "notanumber":
            echo "No introduzcas texto<br>";
            break;

        case "incorrectnumber";
            echo "Introduce un numero mayor de 18 y menor de 130<br>";
            break;
    }
    echo "<label>Escriba su edad(entre 18 y 130 años):";
    echo    "<input type='text' name='edad'></label>";
    echo    "<br>";
    echo    "<input type='submit' value='Comprobar'>";
    echo    "<input type='reset' value='Borrar'>";

    echo "</form>";
?>
<?php include "../../pie.inc"
?>
