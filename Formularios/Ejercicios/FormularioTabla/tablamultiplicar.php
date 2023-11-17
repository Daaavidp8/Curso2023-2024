<?php include "../../../cabecera.inc" ?>
<link rel="stylesheet" href="./tablaMultiplicar.css">
</head>
<body>


<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <label for="numero">Elige un numero</label>
    <input type="number" id="numero" name="numero">
    <input type="submit" value="Enviar">
</form>
<table>
    <tr><th colspan="5">Tabla de multiplicar</th></tr>
<?php

    if (isset($_REQUEST['numero'])) {
        $numero = $_REQUEST['numero'];
        echo '<tr>';
        for ($i = 1; $i <= 10; $i++) {
            echo '<td>' . $i . ' * ' . $numero . ' = ' . $i * $numero . '</td>';
            if ($i == 5) {
                echo '</tr>';
                echo '<tr>';
            }
        }
        echo '</tr>';
    }
?>

</table>

<?php include "../../../pie.inc" ?>