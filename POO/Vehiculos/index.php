<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php include_once "./Moto.php";
include_once "./Carro.php";
include_once "./Bicicleta.php";




$vehiculos[] = new Carro(120,"Audi","A3",4);
$vehiculos[] = new Moto(240,"BMW","SuperRapida",4);
$vehiculos[] = new Bicicleta(25,"Mountain Bike","Extraplus",false);


foreach ($vehiculos as $vehiculo) {


//    Si es una moto pone una cosa y dependiendo si es carro o bici otra.
    echo "<h4>------------" . ($vehiculo instanceof Moto ? " PROBANDO UNA MOTOCICLETA " :
            " OTRAS CARACTERISTICAS DE " .  ($vehiculo instanceof Carro ? "UN CARRO " : "UNA BICICLETA ")) .
        "------------</h4>";

    if ($vehiculo instanceof Bicicleta){
        $vehiculo->empezarApedalear();
        echo "<p>" . ($vehiculo->getPedaleando() ? "Empezando a pedalear": "Dejando de pedalear") . "</p>";
        $vehiculo->dejarDepedalear();
        echo "<p>" . ($vehiculo->getPedaleando() ? "Empezando a pedalear": "Dejando de pedalear") . "</p>";
    }else{
        $vehiculo->disminuirVelocidad(4);
        echo $vehiculo->velocidadMaxima(true);
        $vehiculo->encender();
        echo "<p>El " . $vehiculo->getMarca() . " " . $vehiculo->getModelo() .  " está " . ($vehiculo->getEncendido() ? "Encendido": "Apagado") . "</p>";
        $vehiculo->aumentarVelocidad(30);
        $vehiculo->apagar();
        echo "<p>El " . $vehiculo->getMarca() . " " . $vehiculo->getModelo() .  " está " . ($vehiculo->getEncendido() ? "Encendido": "Apagado") . "</p>";
    }
}






?>
</body>
</html>
