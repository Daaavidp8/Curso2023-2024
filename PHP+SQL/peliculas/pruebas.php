<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tu Título</title>
</head>
<body>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">

    <input type="file" name="fichero" />
    <input type="submit" name="enviar" value="enviar" />
</form>
<?php
ini_set("display_errors",1);


if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
        $nombreDirectorio = "/opt/lampp/htdocs/Curso2023-2024/PHP+SQL/peliculas/imagenes/";
        $nombreFichero = $_FILES['fichero']['name'];
        move_uploaded_file($_FILES['fichero']['tmp_name'], $nombreDirectorio . $nombreFichero);
    } else {
        echo "No se ha podido subir el fichero\n";
    }

}
?>
</body>
</html>


