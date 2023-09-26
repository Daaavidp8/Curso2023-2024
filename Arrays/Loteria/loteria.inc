 <?php
    function aleatorio($fopcion){
    return $fopcion ? rand(1,49) : rand(1,9);
    }

    function loteria($opcion)
    {
        $cantidad = $opcion ? 6 : 2;
        $numeros = [];
        $esta = false;

        for ($i = 0; $i < $cantidad; $i++) {
            do {
                $random = aleatorio($opcion);
                $veces = 0;
                foreach ($numeros as $item) {
                    if ($item == $random) {
                        $esta = true;
                        $veces++;
                    }
                }
                if ($veces == 0) {
                    $esta = false;
                    $numeros[] = $random;
                    echo $random;
                    if ($i !== $cantidad - 1){
                    echo '-';
                    }
                }
            } while ($esta);
        }

    }
?>