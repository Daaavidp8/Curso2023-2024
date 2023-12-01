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
include "./inc/login.inc" ?>

<h1 class="display-4">Selecciona Una Tabla</h1>
<ul class="list-group">
    <li class="list-group-item"><a href="Profesores/mostrar.php" class="btn btn-primary btn-block">Profesores</a></li>
    <li class="list-group-item"><a href="Asignaturas/mostrar.php" class="btn btn-primary btn-block">Asignaturas</a></li>
    <li class="list-group-item"><a href="Imparte/mostrar.php" class="btn btn-primary btn-block">Imparte</a></li>
</ul>

<!-- Add Bootstrap JS and Popper.js -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>
