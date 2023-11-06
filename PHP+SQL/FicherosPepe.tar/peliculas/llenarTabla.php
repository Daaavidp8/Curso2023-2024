<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php
ini_set('display_errors', 1);


$host = "localhost";
$nombreBD = "peliculas";
$usuario = "root";
$password = "";

$pdo = new PDO("mysql:host=$host;dbname=$nombreBD;charset=utf8",$usuario,$password);

include "./vaciarTabla.inc";


$insert = $pdo->prepare("INSERT INTO video(titulo,genero,any,precio)" .
    " VALUES(:titulo, :genero, :any, :precio)");

$fp = fopen("./pelis.txt", "r");

while (!feof($fp)){
    $linea = fgets($fp);
    $linea = explode(",", $linea);

    $insert->bindParam(':titulo', $linea[0]);
    $insert->bindParam(':genero',$linea[1]);
    $insert->bindParam(':any',$linea[2]);
    $insert->bindParam(':precio',$linea[3]);

    try {
        $insert->execute();
    }catch (Exception $error){
        echo $error;
    }
}
fclose($fp);


header('Location: ./index.php');
exit;
?>

</body>
</html>
