<?php include "../cabecera.inc"?>
<link rel="stylesheet" href="./Primos.css">
</head>
<body>
<fieldset>
    <legend>Numeros Primos</legend>
<?php
//3. Crea un array con los 10 primeros números primos.
$primos = [];
for ($i = 1 ; count($primos) < 10; $i++){
    $contador = 0;
    for ($p = 1 ; $p <= $i; $p++){
        if (is_int($i/$p)){
            $contador++;
        }
    }

    if ($contador==2){
        $primos[] = $i;
        echo '<p>' . $i . '</p></br>';
    }

}





?>
</fieldset>
<?php include "../pie.inc"?>
