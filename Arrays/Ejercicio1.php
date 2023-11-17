<?php include "../cabecera.inc"?>
<link rel="stylesheet" href="./ejercicio1.css">
</head>
<body>
<?php
    //Rellena un array con 50 números aleatorios comprendidos entre el 0 y el 99, y luego
    //muéstralo en una lista desordenada. Para crear un número aleatorio, utiliza la
    //función rand(inicio, fin).
    $numeros = [];
    echo '<ul>';
    for ($i = 0; $i < 50;$i++){
        $numeros[] = rand(0,50);
        echo '<li>'. $numeros[$i] .'</li>';
    }
    echo '</ul>';
?>

<?php include "../pie.inc"?>
