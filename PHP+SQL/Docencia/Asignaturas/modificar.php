<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Modificar Asignaturas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<?php
include_once "Asignaturas.php";

if (isset($_REQUEST['add'])){
    $modificar = new Asignaturas();
    $modificar->modificar(strtoupper($_REQUEST['codigo']),strtoupper($_REQUEST['descripcion']),$_REQUEST['creditos'],$_REQUEST['creditosp']);
    header("Location: ./mostrar.php?mensaje=enviado");
}



if (isset($_REQUEST['valores'])){

    $valores = explode(",",$_REQUEST['valores']);

?>
    <h1 class="display-4">Tabla Modificar Tabla Asignaturas</h1>

    <form action="<?= $_SERVER['PHP_SELF']?>">
        <div class="form-group">
            <label for="codigo">Codigo:</label>
            <input type="text" value="<?= $valores[0] ?>" class="form-control" disabled>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion:</label>
            <input type="text" name="descripcion" value="<?= $valores[1] ?>" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="creditos">Creditos:</label>
            <input type="text" name="creditos" value="<?= $valores[2] ?>" pattern="[0-9]{1}.[0-9]{1}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="creditosp">CreditosP:</label>
            <input type="text" name="creditosp" value="<?= $valores[3] ?>" pattern="[0-9]{1}.[0-9]{1}" class="form-control" required>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-success" value="Añadir Asignatura" name="add">
        </div>
        <input type="hidden" name="codigo" value="<?= $valores[0] ?>">
    </form>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php } ?>
</body>
</html>
