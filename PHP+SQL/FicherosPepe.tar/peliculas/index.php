<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peliculas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<?php
ini_set('display_errors', 1);

$host = "localhost";
$nombreBD = "peliculas";
$usuario = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8",$usuario,$password);

?>
<form action="./modificarTabla.php" method="post">
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Genero</th>
            <th>Año</th>
            <th>Precio</th>
        </tr>

        <tr>
            <td colspan="2"><input type="text" style="width: 98%" name="titulo"></td>
            <td><input type="text" name="genero" style="width: 98%"></td>
            <td><input type="text" name="any"></td>
            <td><input type="text" name="precio"></td>
            <td><button class="btn btn-success" name="insertar">Insertar</button></td>
        </tr>

        <?php
        $insert = $pdo->prepare("SELECT * FROM video");
        try {
            $insert->execute();
        } catch (Exception $error) {
            echo $error;
        }
        while ($registro = $insert->fetch()) {
            echo "<tr>";
            echo "<td>" . $registro['id'] . "</td>";
            echo "<td>" . $registro['Titulo'] . "</td>";
            echo "<td>" . $registro['Genero'] . "</td>";
            echo "<td>" . $registro['Any'] . "</td>";
            echo "<td>" . $registro['Precio'] . "</td>";
            echo "<td><button type='submit' class='btn btn-danger' name='borrar' value='" . $registro['id'] . "'>Borrar</button>";

            $valores = [$registro['id'], $registro['Titulo'], $registro['Genero'], $registro['Any'], $registro['Precio']];
            $valores = implode(",", $valores);
            echo "<button type='submit' class='btn btn-primary' name='modificar' value='" . $valores . "'>Modificar</button>";
            echo "</td></tr>";
        }
        ?>
    </table>
</form>
<a href="./llenarTabla.php">Llenar tabla</a>
</body>
</html>

