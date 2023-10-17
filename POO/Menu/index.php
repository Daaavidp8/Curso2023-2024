<?php include "./inc/cabecera.inc"?>
<?php include "./Menu.php";

$paginas = [
        array ("Youtube","youtube.com",false),
        array ("Google","google.com"),
        array ("PcComponentes","pccomponentes.com",false),
        array ("Shein","shein.com"),
];

foreach ($paginas as $pagina){
        $objetos[] = new Menu($pagina[0],$pagina[1],isset($pagina[2]) ? $pagina[2] : True);
}
?>

<div>
    <?php
    foreach ($objetos as $objeto){
        echo '<a href="https://' . $objeto->getEnlace()  . '" target="_blank">' . $objeto->getNombre() . '</a>';
        echo $objeto->getSaltoLinea() ? "<br>" : " ";
    }
    ?>
</div>


<?php include "./inc/pie.inc"?>
