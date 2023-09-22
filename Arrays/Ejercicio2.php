<?php include "../cabecera.inc"?>
<link rel="stylesheet" href="./ejercicio1.css">
</head>
<body>
<?php
        //A partir del ejercicio 1, genera un array aleatorio de 33 elementos con números comprendidos
        //entre el 0 y 100 y calcula El mayor
        //• El menor
        //• La media

    $numeros = [];
    $max = null;
    $min = null;
    $suma = 0;
    echo '<ul>';
    for ($i = 0; $i < 33;$i++){
        $numeros[] = rand(0,100);
        echo '<li>'. $numeros[$i] .'</li>';
        if ($i == 0){
            $max = $numeros[$i];
            $min = $numeros[$i];
        }else{
            if ($max < $numeros[$i]){
                $max = $numeros[$i];
            }else if ($min > $numeros[$i]){
                $min = $numeros[$i];
            };
        }
        $suma += $numeros[$i];
    }
    echo '<br>';
    echo '<p>El maximo es ' . $max . '</p>\n';
    echo '<p>El minimo es ' . $min . '</p>\n';
    echo '<p>La media es es ' . $suma/33 . '</p>\n';

echo '</ul>';
?>
<?php include "../pie.inc"?>
