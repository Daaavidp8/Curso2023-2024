<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Tabla de Multiplicar</title>
    <link rel="stylesheet" type="text/css" href="./tabla.css" />
</head>
<body>
<?php
function multiplicar($num)
{
    $mostrar = '<div class="box">';
    for ($i = 0 ;$i <= 10;$i++){
        if ($i == 0){
            $mostrar .= '<h1>Tabla del ' . $num . ' </h1>';
        }
        $resultado = $num * $i;
        $mostrar .= $num . '*' . $i . '=' . $resultado . '<br>';
        if ($i == 10){
            $mostrar .= '</div>';
        }
    }
    return $mostrar;
}
?>

<div class="container">
    <?php
    for ($i = 1; $i<=10; $i++){
    echo multiplicar($i);
    }
    ?>

</div>
</body>
</html>
