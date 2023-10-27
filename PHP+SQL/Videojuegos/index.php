<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Videojuegos</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <label>Nombre: <input type="text" name="nombre"></label><br>
    <label>Genero: <input type="text" name="genero"></label><br>
    <label>Precio: <input type="number" name="precio"></label><br>
    <input type="submit" value="enviar" name="submit">
</form>
<?php
ini_set("display_errors",1);

$host = "localhost";
$nombreBD = "Videojuegos";
$usuario = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8",$usuario,$password);

$insert = $pdo->prepare("INSERT INTO Videojuegos(titulo,genero,precio)" .
            " VALUES(:titulo, :genero, :precio)");

$insert->bindParam(':titulo',$_REQUEST['nombre']);
$insert->bindParam(':genero',$_REQUEST['genero']);
$insert->bindParam(':precio',$_REQUEST['precio']);

try {
    $insert->execute();
}catch (Exception $error){
    echo $error;
}?>


<table>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Genero</th>
        <th>Precio</th>
    </tr>
<?php


if (isset($_REQUEST['submit'])){
    echo "entra";
    $insert = $pdo->prepare("SELECT * FROM Videojuegos");
    try {
        $insert->execute();
    }catch (Exception $error){
        echo $error;
    }
    while ($registro = $insert->fetch()){
        echo "<tr>";
        echo "<td>" . $registro['id'] . "</td>";
        echo "<td>" . $registro['titulo'] . "</td>";
        echo "<td>" . $registro['genero'] . "</td>";
        echo "<td>" . $registro['precio'] . "</td>";
        echo "</tr>";
    }
}
?>
</table>


</body>
</html>
