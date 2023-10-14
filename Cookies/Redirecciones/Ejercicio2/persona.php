<?php include "../../cabecera.inc"
?>
<?php
    $edad = $_REQUEST['edad'];
    $nombre = $_REQUEST['nombre'];
    $errores = "";
    $mensaje = "";
    $mostrar = [true,true];

    if (empty($edad)){
        $errores .= "erroredad=vacio";
    }else if( !is_numeric($edad)){
        $errores .= "erroredad=notanumber";
    }else if ($edad < 18 || $edad > 130){
        $errores .= "erroredad=incorrectnumber";
    }else{
        $mensaje .= "<h1>Su edad es $edad</h1><br>";
        $mostrar[0] = false;
    }

    if (!empty($errores)){
        $errores .= "&";
    }

    if (empty($nombre)){
        $errores .= "errornombre=vacio";
    }else if(is_numeric($nombre)){
        $errores .= "errornombre=isanumber";
    }else{
        $mensaje .= "<h1>Su nombre es $nombre</h1>";
        $mostrar[1] = false;
    }

    if (!$mostrar[0] && !$mostrar[1]){
        echo "<p>$mensaje</p>";
    }else{
        header("Location:Formulario.php?$errores");
    }


?>


<?php include "../../pie.inc"
?>
