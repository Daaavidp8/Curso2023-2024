<?php
ini_set("display_errors",1);

//Fichero en el que deseamos guardar el resultado
$fp = fopen("ficherito.txt","w");

$nombreDirectorio = null;
$nombreFichero = null;
if (is_uploaded_file($_FILES['fichero']['tmp_name'])) {
    $nombreDirectorio = "/opt/lampp/htdocs/Curso2023-2024/diseño(Alfonso)/";
    $nombreFichero = $_FILES['fichero']['name'];
    move_uploaded_file($_FILES['fichero']['tmp_name'], $nombreDirectorio . $nombreFichero);
}

//imagen que queremos leer (hay que tener gd.lib instalada y activa)
$img = imagecreatefrompng($nombreFichero);

//Obtenemos el tamaño
$w = imagesx($img); //ancho
$h = imagesy($img); //alto


for($y = 0; $y < $h; $y+=($h/100)) {
    for($x = 0; $x < $w; $x+=($x/100)) {
        $rgb = imagecolorat($img, $x, $y);

        //Valor de las componentes RGB de cada pixel
        $r = $rgb >> 16;
        $g = $rgb >> 8 & 255;
        $b = $rgb & 255;

        //Elegir el caracter según la luminosidad del pixel y escribir en el fichero

        $luminosity = (0.299 * $r + 0.587 * $g + 0.114 * $b) / 255;

        // Elegir el carácter según la luminosidad y escribir en el archivo
        $char = ($luminosity > 0.5) ? ' ' : '$'; // Aquí estoy usando 0.5 como umbral, ajusta según sea necesario
        fwrite($fp, $char);
    }
    fwrite($fp, PHP_EOL);
}

fclose($fp);
unlink($nombreFichero);

header("Location: ./ficherito.txt");

?>