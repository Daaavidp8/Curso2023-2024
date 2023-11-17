<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" type="text/css" href="./styles/index.css">
</head>
<body>
<?php
ini_set('display_errors', 1);
include_once "./Moto.php";
include_once "./Carro.php";
include_once "./Bicicleta.php";
session_start();
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">

    <label>Selecciona Tipo de Vehiculo:
        <select name="vehiculo">
            <option value="Bicicleta">Bicicleta</option>
            <option value="Carro">Carro</option>
            <option value="Moto">Moto</option>
        </select>
    </label>

    <label>Velocidad: <input type="number" name="Velocidad" value="50"></label>

    <label>Marca: <input type="text" name="Marca"></label>

    <label>Modelo: <input type="text" name="Modelo"></label>

    <label>Encendido/Pedaleando:<br>
    <label>Si<input type="radio" name="pregunta" value="1" checked></label>
    <label>No<input type="radio" name="pregunta" value="0"></label>
    </label>


    <input type="submit" value="Añadir Objeto">

    <input type="submit" value="Eliminar Objetos" name="vacio">
</form>




<?php

// Destruimos la sesion si el submit con el name vacion es pulsado
if (isset($_REQUEST['vacio'])){
    session_destroy();
    header("Location: index.php");
    exit();
}



// Si la sesion de vehiculos no existe la creamos como array
if (!isset($_SESSION['vehiculos'])){
    $_SESSION['vehiculos'] = array();
}


// Creamos el objeto dependiendo el name vehiculo del formulario
if (isset($_REQUEST['vehiculo'])){
    if ($_REQUEST['vehiculo'] === "Bicicleta"){
        $_SESSION['vehiculos'][] = New Bicicleta($_REQUEST['Velocidad'],$_REQUEST['Marca'],$_REQUEST['Modelo'],(bool)$_REQUEST['pregunta']);
    }elseif ($_REQUEST['vehiculo'] === "Carro"){
        $_SESSION['vehiculos'][] = New Carro($_REQUEST['Velocidad'],$_REQUEST['Marca'],$_REQUEST['Modelo'],(bool)$_REQUEST['pregunta']);
    }else{
        $_SESSION['vehiculos'][] = New Moto($_REQUEST['Velocidad'],$_REQUEST['Marca'],$_REQUEST['Modelo'],(bool)$_REQUEST['pregunta']);
    }
}


// Mostrar Los Objetos
if (isset($_SESSION['vehiculos'])){
    echo "<div class='container'>";

    foreach ($_SESSION['vehiculos'] as $vehiculo) {
        echo "<div class='caja'>";


        echo "<h1>";
        if ($vehiculo->getMarca() == "" && $vehiculo->getModelo() == ""){
            echo "Sin Nombre";
        }else{
             echo $vehiculo->getMarca() . " " . $vehiculo->getModelo();
        }
        echo "</h1>";

        echo "<img src='img/" . get_class($vehiculo) .".jpg'>";
        echo "<p>Velocidad: " . $vehiculo->getVelocidad() . " Km/h</p>";
        $estado = $vehiculo instanceof Bicicleta ? ($vehiculo->getPedaleando() ? "Pedaleando" : "No pedaleando"):
            ($vehiculo->getEncendido() ? "Encendid" : "Apagad") . ($vehiculo instanceof Carro ? "o" : "a");
        echo "<p>Estado: " . $estado . " Km/h</p>";
        echo "</div>";
    }

    echo "</div>";
}







?>
</body>
</html>
