<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Tabla Imparte</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body class="container mt-5">
<?php
ini_set("display_errors", 1);
require_once 'Imparte.php';
require_once '../Profesores/profesores.php';
require_once '../Asignaturas/Asignaturas.php';
try {
    $imparte = new Imparte();
    $consulta = $imparte->mostrar();
} catch (Exception $error) {
echo $error->getMessage();
}
?>
<h1 class="display-4">Imparte</h1>

<form action="insertar.php" method="post">
    <table class="table table-bordered">
        <thead class="thead-dark">
        <tr>
            <th>Dni</th>
            <th>Asignatura</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>
                <select name="dni" class="form-control">
                    <?php
                    try {
                        $profesores = new Profesores();
                        $dniProfesores = $profesores->mostrar();
                    } catch (Exception $error) {
                        echo $error->getMessage();
                    }
                    foreach ($dniProfesores as $registro) {
                        echo '<option value="' . $registro[0] . '">' . $registro[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td>
                <select name="asignatura" class="form-control">
                    <?php
                    try {
                        $asignaturas = new Asignaturas();
                        $codigoAsignaturas = $asignaturas->mostrar();
                    } catch (Exception $error) {
                        echo $error->getMessage();
                    }
                    foreach ($codigoAsignaturas as $registro) {
                        echo '<option value="' . $registro[0] . '">' . $registro[0] . '</option>';
                    }
                    ?>
                </select>
            </td>
            <td class="align-middle" style="width: 1%;">
                <input type="submit" class="btn btn-success" value="Añadir Impartición" name="add">
            </td>
        </tr>

        <?php
        foreach ($consulta as $registro) {
            echo "<tr>";
            echo "<td>" . $registro['dni'] . "</td>";
            echo "<td>" . $registro['asignatura'] . "</td>";
            echo "<td>";
            echo "<a href='./eliminar.php?dni=" . $registro['dni'] . "' class='btn btn-danger btn-block' style='color: white'>Borrar</a>";
            echo "</td>";
            echo "</tr>";
        }
        ?>
        </tbody>
    </table>
</form>

<?php
if (isset($_REQUEST['mensaje'])){?>
    <div class="alert alert-success" role="alert">
        ¡Éxito! Tu operación se ha completado correctamente.
    </div>
<?php }
?>

<div class="d-flex justify-content-center">
    <a href="../Asignaturas/mostrar.php" class="btn btn-outline-primary mr-5">Anterior</a>
    <a href="../Profesores/mostrar.php" class="btn btn-outline-primary ml-5">Siguiente</a>
</div>

</body>

</html>