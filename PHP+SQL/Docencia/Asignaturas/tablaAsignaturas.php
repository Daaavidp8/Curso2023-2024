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
    $insert = $pdo->prepare("INSERT INTO asignaturas(codigo,descripcion,creditos,creditosp)" .
        " VALUES(:codigo, :descripcion, :creditos, :creditosp)");


    $codigo = strtoupper($_REQUEST['codigo']);
    $descripcion = strtoupper($_REQUEST['descripcion']);
    $creditos = (float)$_REQUEST['creditos'];
    $creditosp = (float)$_REQUEST['creditosp'];

    $insert->bindParam(':codigo', $codigo);
    $insert->bindParam(':descripcion',$descripcion);
    $insert->bindParam(':creditos',$creditos);
    $insert->bindParam(':creditosp',$creditosp);

    try {
        $insert->execute();
    }catch (Exception $error){
        echo $error;
    }
}


?>
<h1>Asignaturas</h1>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    <table>
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Creditos</th>
            <th>Creditosp</th>
        </tr>
        <?php
            $insert = $pdo->prepare("SELECT * FROM asignaturas");
            try {
                $insert->execute();
            }catch (Exception $error){
                echo $error;
            }
            while ($registro = $insert->fetch()){
                echo "<tr>";
                echo "<td>" . $registro['codigo'] . "</td>";
                echo "<td>" . $registro['descripcion'] . "</td>";
                echo "<td>" . $registro['creditos'] . "</td>";
                echo "<td>" . $registro['creditosp'] . "</td>";
                echo "</tr>";
            }?>
                <tr>
                    <td><input type="text" name="codigo" required></td>
                    <td><input type="text" style="width: 98%" name="descripcion" required></td>
                    <td><input type="text" pattern="[0-9].[0-9]" name="creditos" required></td>
                    <td><input type="text" pattern="[0-9].[0-9]" name="creditosp"></td>
                </tr>
    </table>
        <input type="submit" value="Añadir Asignatura" name="add">
</form>


<a href="../Profesores/index.php">Anterior</a>
<a href="../Imparte/tablaImparte.php">Siguiente</a>
</body>
</html>
