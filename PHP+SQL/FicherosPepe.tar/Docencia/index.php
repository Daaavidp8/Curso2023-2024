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
    $insert = $pdo->prepare("INSERT INTO profesores(dni,nombre,categoria,ingreso)" .
        " VALUES(:dni, :nombre, :categoria, :ingreso)");


    $dni = $_REQUEST['dni'];
    $nombre = strtoupper($_REQUEST['nombre']);
    $categoria = strtoupper($_REQUEST['categoria']);
    $ingreso = $_REQUEST['ingreso'];

    $insert->bindParam(':dni', $dni);
    $insert->bindParam(':nombre',$nombre);
    $insert->bindParam(':categoria',$categoria);
    $insert->bindParam(':ingreso',$ingreso);

    try {
        $insert->execute();
    }catch (Exception $error){
        echo $error;
    }
}




?>
<h1>Profesores</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <tr>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Ingreso</th>
        </tr>
    <?php

    $insert = $pdo->prepare("SELECT * FROM profesores");
    try {
        $insert->execute();
    }catch (Exception $error){
        echo $error;
    }
    while ($registro = $insert->fetch()){
        echo "<tr>";
        echo "<td>" . $registro['dni'] . "</td>";
        echo "<td>" . $registro['nombre'] . "</td>";
        echo "<td>" . $registro['categoria'] . "</td>";
        echo "<td>" . $registro['ingreso'] . "</td>";
        echo "</tr>";
    }?>
        <tr>
            <td>
                <input type="text" name="dni" pattern="[0-9]{8}[A-Z]" required>
            </td>
            <td>
                <input type="text" name="nombre" pattern="[a-zA-Z]+ [a-zA-Z]+" required>
            </td>
            <td>
                <input type="text" name="categoria" required>
            </td>
            <td>
                <input type="date" name="ingreso" value="<?=date('Y-m-d')?>" required>
            </td>
        </tr>
    </table>
    <input type="submit" value="Añadir Profesor" name="add">
</form>

<a href="./tablaImparte.php">Anterior</a>
<a href="./tablaAsignaturas.php">Siguiente</a>
</body>
</html>
