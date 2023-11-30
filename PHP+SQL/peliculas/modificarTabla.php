<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tu Título</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./index.css">
</head>
<body>
<?php
ini_set('display_errors', 1);



function executeVar($variable) {
    try {
        $variable->execute();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

function redirect() {
    header('Location: ./index.php');
}

$host = "localhost";
$nombreBD = "peliculas";
$usuario = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8", $usuario, $password);

if (isset($_REQUEST['modificarDatabase'])) {

    $ruta = anadirFicheroaLaCarpeta('fichero');


    $modificar = $pdo->prepare("UPDATE video SET Titulo=:titulo,Genero=:genero,Any=:any,Precio=:precio,imagen=:caratula WHERE id=:id");

    $modificar->bindParam(':id', $_REQUEST['id']);
    $modificar->bindParam(':titulo', $_REQUEST['titulo']);
    $modificar->bindParam(':genero', $_REQUEST['genero']);
    $modificar->bindParam(':any', $_REQUEST['any']);
    $modificar->bindParam(':precio', $_REQUEST['precio']);
    $modificar->bindParam(':caratula', $ruta);

    executeVar($modificar);

    echo $_REQUEST['caratula'];

    redirect();
}

if (isset($_REQUEST['borrar'])) {
    $eliminar = $pdo->prepare("DELETE FROM video WHERE id = :id");
    $eliminar->bindParam(':id', $_REQUEST['borrar']);

    executeVar($eliminar);

    redirect();

} elseif (isset($_REQUEST['modificar'])) {
    $valores = $_REQUEST['modificar'];
    $valores = explode(",", $valores);
    ?>
    <div class="container">
        <h2>Modificar Registro</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $valores[0] ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" name="titulo" value="<?php echo $valores[1] ?>">
            </div>
            <div class="mb-3">
                <label for="genero" class="form-label">Género:</label>
                <input type="text" class="form-control" name="genero" value="<?php echo $valores[2] ?>">
            </div>
            <div class="mb-3">
                <label for="any" class="form-label">Año:</label>
                <input type="text" class="form-control" name="any" value="<?php echo $valores[3] ?>">
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio:</label>
                <input type="text" class="form-control" name="precio" value="<?php echo $valores[4] ?>">
            </div>
            <div class="mb-3">
                <label class="custom-file">
                    <input type="file" class="custom-file-input" name="fichero">
                    <span class="custom-file-label">
                        <?php
                        echo $valores[5] != "" ? '<img src="' . $valores[5] . '" class="imagenes">' : '<div class="withoutFile">Sin imagen</div>' ?>
                    </span>
                </label>
            </div>
            <button type="submit" class="btn btn-primary" name="modificarDatabase">Modificar</button>
        </form>
    </div>
<?php } elseif (isset($_REQUEST['insertar'])) {

    $ruta = anadirFicheroaLaCarpeta('caratula');


    $insertar = $pdo->prepare("INSERT INTO video(Titulo,Genero,Any,Precio,imagen) VALUES (:titulo, :genero, :any , :precio, :caratula)");


    $insertar->bindParam(':titulo', $_REQUEST['titulo']);
    $insertar->bindParam(':genero', $_REQUEST['genero']);
    $insertar->bindParam(':any', $_REQUEST['any']);
    $insertar->bindParam(':precio', $_REQUEST['precio']);
    $insertar->bindParam(':caratula', $ruta);

    executeVar($insertar);

    redirect();
}




function anadirFicheroaLaCarpeta($fichero) {
    if (is_uploaded_file($_FILES[$fichero]['tmp_name'])) {
        $nombreDirectorio = "/opt/lampp/htdocs/Curso2023-2024/PHP+SQL/peliculas/imagenes/";
        $nombreFichero = $_FILES[$fichero]['name'];
        move_uploaded_file($_FILES[$fichero]['tmp_name'], $nombreDirectorio . $nombreFichero);
        return "/Curso2023-2024/PHP+SQL/peliculas/imagenes/" . $nombreFichero;
    } else {
        return "sin ruta especificada";
    }
}
?>
</body>
</html>

