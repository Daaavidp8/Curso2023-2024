<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profesores</title>
    <!-- Agregar Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body class="container mt-5">

<?php
ini_set("display_errors",1);
require_once 'profesores.php';
try {
    $profesores = new Profesores();
    $consulta = $profesores->mostrar();
} catch (Exception $e) {
    die($e->getMessage());
}
?>

<h1 class="display-4">Profesores</h1>

<form action="insertar.php" method="post">
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Dni</th>
            <th>Nombre</th>
            <th>Categoria</th>
            <th>Ingreso</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <input type="text" name="dni" pattern="[0-9]{8}" class="form-control" required>
            </td>
            <td>
                <input type="text" name="nombre" pattern="[a-zA-Z]+ [a-zA-Z]+[\s]*[a-zA-Z]*" class="form-control" required>
            </td>
            <td>
                <input type="text" name="categoria" class="form-control" required>
            </td>
            <td>
                <input type="date" name="ingreso" value="<?=date('Y-m-d')?>" class="form-control" required>
            </td>
            <td>
                <input type="submit" class="btn btn-success" value="Añadir Profesor" name="add">
            </td>
        </tr>
        <?php
        foreach($consulta as $registro){
            echo "<tr>";
            echo "<td>" . $registro['dni'] . "</td>";
            echo "<td>" . $registro['nombre'] . "</td>";
            echo "<td>" . $registro['categoria'] . "</td>";
            echo "<td>" . $registro['ingreso'] . "</td>";
            echo "<td>";
            echo "<a href='./eliminar.php?dni=" . $registro['dni'] . "' class='btn btn-danger' style='color: white'>Borrar</a>";

            $valores = [$registro['dni'], $registro['nombre'], $registro['categoria'], $registro['ingreso']];
            $valores = implode(",", $valores);

            echo "<a href='modificar.php?valores=" . $valores . "' class='btn btn-primary' style='color: white'>Modificar</a>";
            echo "</td>";
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
</form>

<!-- Agregar Bootstrap JS y Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<!-- Bootstrap-styled links -->
<a href="../Imparte/tablaImparte.php" class="btn btn-primary">Anterior</a>
<a href="../Asignaturas/tablaAsignaturas.php" class="btn btn-primary">Siguiente</a>

</body>
</html>
