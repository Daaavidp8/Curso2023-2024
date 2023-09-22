<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Numeros Primos</title>
    <link rel="stylesheet" type="text/css" href="./primos.css" />
</head>
<body>
<?php
function primos(){
    for ($i = 1 ; $i <= 100; $i++){
        $contador = 0;
        for ($p = 1 ; $p <= 100; $p++){
            if (is_int($i/$p)){
                $contador++;
            }
        }
        if ($contador==2){
            echo '<div class="primobox">' . '<p>' . $i .'</p></div>';
        }else{
            echo '<div>' . '<p>' . $i .'</p></div>';}
    }
}
?>
<div class="container">
<?php
    primos();
?>
</div>
</body>
</html>
