<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mostrar Asignaturas</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<?php
include_once "Asignaturas.php";
include "../inc/login.inc";

try {
    $asignaturas = new Asignaturas();
    $consulta = $asignaturas->mostrar();
}catch (Exception $e){
    die($e->getMessage());
}
?>


<h1 class="display-4">Asignaturas</h1>

<form action="insertar.php" method="post">
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Codigo</th>
            <th>Descripcion</th>
            <th>Creditos</th>
            <th>Creditosp</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <input type="text" name="codigo" maxlength="4" class="form-control" required>
            </td>
            <td>
                <input type="text" name="descripcion" class="form-control" required>
            </td>
            <td>
                <input type="text" name="creditos" pattern="[0-9]{1}.[0-9]{1}" class="form-control" required>
            </td>
            <td>
                <input type="text" name="creditosp" pattern="[0-9]{1}.[0-9]{1}" class="form-control" required>
            </td>
            <td>
                <input type="submit" class="btn btn-success" value="Añadir Asignatura" name="add">
            </td>
        </tr>
        <?php
        foreach($consulta as $registro){
            echo "<tr>";
            echo    "<td>" . $registro['codigo'] . "</td>";
            echo    "<td>" . $registro['descripcion'] . "</td>";
            echo    "<td>" . ($registro['creditos'] === null ? 0.0 : $registro['creditos']). "</td>";
            echo    "<td>" . ($registro['creditosp'] === null ? "0.0" : $registro['creditosp']) . "</td>";
            echo    "<td>";
            echo        "<div class='d-flex justify-content-center'>";
            echo            "<a href='./eliminar.php?codigo=" . $registro['codigo'] . "' class='btn btn-danger mr-2' style='color: white'>Borrar</a>";

            $valores = [$registro['codigo'], $registro['descripcion'], $registro['creditos'], $registro['creditosp']];
            $valores = implode(",", $valores);

            echo            "<a href='./modificar.php?valores=" . $valores . "' class='btn btn-primary' style='color: white'>Modificar</a>";
            echo        "</div>";
            echo    "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
    <?php
    if (isset($_REQUEST['mensaje'])){?>
        <div class="alert alert-success" role="alert">
            ¡Éxito! Tu operación se ha completado correctamente.
        </div>
    <?php }
    ?>
    <div class="d-flex justify-content-center">
        <a href="../Profesores/mostrar.php" class="btn btn-outline-primary mr-5">Anterior</a>
        <a href="../Imparte/mostrar.php" class="btn btn-outline-primary ml-5">Siguiente</a>
    </div>

</form>
</body>
</html>
