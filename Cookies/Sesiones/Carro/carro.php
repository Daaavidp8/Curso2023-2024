<?php include "../cabecera.inc";
$articulos = array(
    array("id" => 1, "nombre" => "Zapatillas Nike", "precio" => 60),
    array("id" => 2, "nombre" => "Sudadera Domyos", "precio" => 15),
    array("id" => 3, "nombre" => "Pala de pádel Vairo", "precio" => 50),
    array("id" => 4, "nombre" => "Pelota de baloncesto Molten", "precio" => 20)
);
?>



<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <div>
    <?php
    for ($i = 0;$i < count($articulos);$i++){
        echo "<input type='submit' class='button-50' value='" . $articulos[$i]['nombre'] . "' name='id'>";
    }
    ?>
    </div>
    <br>
    <input type="submit" value="vaciar" name="vacio" id="vaciar">

</form>

<?php
session_start();

if (isset($_REQUEST['vacio'])){
    session_destroy();
    header("Location: carro.php");
    exit();
}


if (isset($_REQUEST['id'])) {
    $_SESSION['producto'] = $_REQUEST['id'];
    $encontrado = false;
    for ($i = 0; $i < count($articulos) && !$encontrado; $i++) {
        if ($_SESSION['producto'] === $articulos[$i]['nombre']) {
            $_SESSION['compras'] .= "-" . $articulos[$i]['nombre'] . "(" . $articulos[$i]['precio'] . " euros)<br/>";
            $_SESSION['total'] += $articulos[$i]['precio'];
            $encontrado = true;
        }
    }
}

if (isset($_SESSION['compras'])){
    echo $_SESSION['compras'];
    echo "<hr/>";
    echo "Total: " . $_SESSION['total'] . "€";
}



?>




<?php
include "../pie.inc"
?>
