<?php include "./cabecera.inc"?>
<?php

$numeros = [];
$cogidos = [];

    function aleatorio(){
        return rand(1,49);
    }


    for ($i = 0;$i <= 6;$i++){
        $random = aleatorio();
        do{
            $random = aleatorio();
        }while(!(in_array($random,$cogidos)));
        $cogidos[] = $random;
        $numeros[] = $random;
    }

    echo "Primitiva: ";
    foreach ($numeros as $numero){
        echo $numero . " ";
    }


?>
<?php include "./loteria.inc"?>

<div>
<?php
echo "<h1>Primitiva: </h1>";
?>

    <p>
         <?php
             loteria(true);
        ?>
    </p>
</div>
<?php include "../../pie.inc"?>
