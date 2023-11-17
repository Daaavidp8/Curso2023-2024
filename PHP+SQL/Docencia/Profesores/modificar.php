<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<?php

require_once 'profesores.php';




if (isset($_REQUEST['modificar'])){
    try {
        $profesores = new Profesores();
        $profesores->modificar($_REQUEST['dninuevo'],strtoupper($_REQUEST['nombre']),strtoupper($_REQUEST['categoria']),$_REQUEST['ingreso'],$_REQUEST['dniantiguo']);
        header('Location: ./mostrar.php?mensaje=modificado');
    }catch (Exception $e){
        die($e->getMessage());
    }
}


if (isset($_REQUEST['valores'])){

    $valores = explode(",", $_REQUEST['valores']);?>

    <h1 class="display-4">Tabla Modificar Tabla Profesores</h1>

    <form action="<?php echo $_SERVER['PHP_SELF']?>">
        <div class="form-group">
            <label for="dninuevo">Dni:</label>
            <input type="text" name="dninuevo" pattern="[0-9]{8}" class="form-control" value="<?= $valores[0] ?>" required>
        </div>

        <div class="form-group">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" pattern="[a-zA-Z]+ [a-zA-Z]+[\s]*[a-zA-Z]*" class="form-control" value="<?= $valores[1] ?>" required>
        </div>

        <div class="form-group">
            <label for="categoria">Categoria:</label>
            <input type="text" name="categoria" class="form-control" value="<?= $valores[2] ?>" required>
        </div>

        <div class="form-group">
            <label for="ingreso">Fecha De Ingreso:</label>
            <input type="date" name="ingreso" value="<?= $valores[3] ?>" class="form-control" required>
        </div>

        <input type="hidden" name="dniantiguo" value="<?= $valores[0] ?>">

        <input type="submit" class="btn btn-primary" name="modificar" value="Guardar Cambios">
    </form>

    <!-- Agregar Bootstrap JS y Popper.js -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>


    <?php
}
?>

</body>
</html>


