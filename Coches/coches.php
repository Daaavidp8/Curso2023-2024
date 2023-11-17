<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>

<div>
    <?php
    $coches = array(
            "000BBB" => array(
                                "marca"=>"seat",
                                "modelo"=>"leon",
                                "puertas"=> 5,
            ),
            "001BBB" => array(
                                "marca" => "nissan",
                                "modelo" => "qasqai",
                                "puertas" => 5,
            ),
            "002BBB" => array(
                                "marca" => "audi",
                                "modelo" => "A3",
                                "puertas" => 5,
            ),
            "003BBB" => array(
                                "marca" => "mercedes",
                                "modelo" => "c200",
                                "puertas" => 5,
            )
    );

    echo 'Matricula  |  marca<br/>';
    foreach ($coches as $matricula=>$coche){
        echo $matricula . " -> " . $coche['marca'];
       echo '<br>';
    }
    ?>


</div>
</body>
</html>
