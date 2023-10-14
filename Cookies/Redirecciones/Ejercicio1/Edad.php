<?php include "../../cabecera.inc"
?>
<?php


$edad = $_REQUEST['edad'];
if (empty($edad)){
    header("Location:Formulario.php?error=vacio");
}else if( !is_numeric($edad)){
    header("Location:Formulario.php?error=notanumber");
}else if ($edad < 18 || $edad > 130){
    header("Location:Formulario.php?error=incorrectnumber");
}else{
    echo "<h1>Su edad es $edad</h1>";
    echo "<a href='Formulario.php'>Volver al formulario</a>";
}
?>

<?php include "../../pie.inc"
?>
