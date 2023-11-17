<?php include "./cabecera.inc";
?>
<body>
<form action="./guarda_prefs.php" method="post">
<label>Pon aqui tu nombre<input type="text" name="nombre"></label><br>
<label>Elige tu color favorito<input type="color" name="color"></label>
    <br><br>
    <input type="submit" value="Enviar">
    <input type="reset" value="Borrar">
</form>
<?php include "../../pie.inc";
?>
