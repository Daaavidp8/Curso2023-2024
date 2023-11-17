<?php
include "./cabecera.inc"
?>
<?php
$archivo = "archivo.txt";
$fp = fopen($archivo, "r+") or die("Unable to open file!");
$numero = (int)fread($fp,filesize($archivo));
$numero++;
fseek($fp,0);
fwrite($fp,$numero);
fclose($fp);


echo $numero;
?>
<br>
<form method="post">
    <input type="submit" value="Enviar"></form>

<?php
include "../../pie.inc"
?>
