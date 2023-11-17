<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php
ini_set("display_errors",1);

$host = "localhost";
$nombreBD = "docencia";
$usuario = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8",$usuario,$password);


if (isset($_REQUEST['add'])){
    $insert = $pdo->prepare("INSERT INTO imparte(dni,asignatura)" .
        " VALUES(:dni, :asignatura)");
    $dni = $_REQUEST['dni'];
    $asignatura = $_REQUEST['asignatura'];

    $insert->bindParam(':dni', $dni);
    $insert->bindParam(':asignatura',$asignatura);

    try {
        $insert->execute();
    }catch (Exception $error){
        echo $error;
    }
}

?>
<h1>Imparte</h1>

<form>
    <table>
        <tr>
            <th>Dni</th>
            <th>Asignatura</th>
        </tr>
        <?php
            $insert = $pdo->prepare("SELECT * FROM imparte");
            try {
                $insert->execute();
            }catch (Exception $error){
                echo $error;
            }
            while ($registro = $insert->fetch()){
                echo "<tr>";
                echo "<td>" . $registro['dni'] . "</td>";
                echo "<td>" . $registro['asignatura'] . "</td>";
                echo "</tr>";
            }
        ?>
        <tr>
            <td>
                <select name="dni">
                    <?php
                        $filas = $pdo->prepare("SELECT dni FROM profesores");
                    try {
                        $filas->execute();
                    }catch (Exception $error){
                        echo $error;
                    }
                    $dnis = [];
                    while ($registro = $filas->fetch()){
                        echo '<option value="' . $registro[0] .'">' . $registro[0] . '</option>';
                    }
                    ?>
                </select>
            </td>

            <td>
                <select name="asignatura">
                    <?php
                    $filas = $pdo->prepare("SELECT codigo FROM asignaturas");
                    try {
                        $filas->execute();
                    }catch (Exception $error){
                        echo $error;
                    }
                    $dnis = [];
                    while ($registro = $filas->fetch()){
                        echo '<option value="' . $registro[0] .'">' . $registro[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>


    </table>
    <input type="submit" value="Añadir Imparticion" name="add">
</form>

<a href="../Asignaturas/tablaAsignaturas.php">Anterior</a>
<a href="../Profesores/index.php">Siguiente</a>
</body>
</html>
