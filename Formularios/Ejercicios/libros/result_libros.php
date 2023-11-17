<?php include "../../../cabecera.inc" ?>
<link rel="stylesheet" href="./libros.css">
</head>
<body>
<?php
$sitio = ["Titulo del libro","Titulo del autor","Editorial"];
$tipo = ["Narrativa","Libros de texto","Guías y mapas"];
?>

<table>
    <tr>
        <th>Texto</th>
        <th>Buscar</th>
        <th>Tipo</th>
    </tr>

    <tr>
            <?php echo '<td>' . $_REQUEST["busqueda"] . '</td>';
             echo '<td>' . $sitio[$_REQUEST["site"]] . '</td>';
             echo '<td>' . $tipo[$_REQUEST["type"]] . '</td>';
             ?>
    </tr>


</table>
<a href="form_libros.php">Volver</a>


<?php include "../../../pie.inc" ?>
