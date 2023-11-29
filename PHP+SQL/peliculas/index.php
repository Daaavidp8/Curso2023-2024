<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Peliculas</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./index.css">
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
<form action="./modificarTabla.php" method="post" enctype="multipart/form-data">
    <table class="table">
        <tr>
            <th>Id</th>
            <th>Titulo</th>
            <th>Genero</th>
            <th>Año</th>
            <th>Precio</th>
            <th>Caratula</th>
        </tr>

        <tr>
            <td colspan="2"><input type="text" style="width: 98%" name="titulo"></td>
            <td><input type="text" name="genero" style="width: 98%"></td>
            <td><input type="text" name="any"></td>
            <td><input type="text" name="precio"></td>
            <td><label class="custom-file">
                    <input type="file" class="custom-file-input" name="caratula">
                    <span class="custom-file-label">
                        <button class="btn btn-outline-primary">Añadir Caratula</button>
                    </span>
                </label>
            </td>
            <td>
                <button class="btn btn-success" name="insertar">Insertar</button>
            </td>
        </tr>

        <?php
        $insert = $pdo->prepare("SELECT * FROM video");
        try {
            $insert->execute();
        } catch (Exception $error) {
            echo $error;
        }
        while ($registro = $insert->fetch()) {?>
            <tr>
                <td>
                    <?=$registro['id']?>
                </td>

                <td>
                    <?=$registro['Titulo']?>
                </td>

                <td>
                    <?=$registro['Genero']?>
                </td>

                <td>
                    <?=$registro['Any']?>
                </td>

                <td>
                    <?=$registro['Precio']?>
                </td>

                <td>
                    <span class="custom-file-label">
                        <?php echo $registro['imagen'] != "" ? '<img src="' . $registro['imagen'] . '" class="imagenes">' : '<div class="withoutFile">Sin imagen</div>' ?>
                    </span>
                </td>

                <td>
                    <button type='submit' class='btn btn-danger' name='borrar' value='<?=$registro['id']?>'>Borrar</button>
                    <?php
                    $valores = [$registro['id'], $registro['Titulo'], $registro['Genero'], $registro['Any'], $registro['Precio'], $registro['imagen']];
                    $valores = implode(",", $valores);
                    ?>
                    <button type='submit' class='btn btn-primary' name='modificar' value='<?=$valores?>'>Modificar</button>
                </td>

            </tr>
            <?php
        }
        ?>
    </table>
</form>
<a href="./llenarTabla.php">Restablecer Tabla</a>
</body>
</html>

