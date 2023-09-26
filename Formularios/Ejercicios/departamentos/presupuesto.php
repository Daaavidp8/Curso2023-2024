<?php include "../../../cabecera.inc" ?>
<link rel="stylesheet" href="./departamentos.css">
</head>
<body>
<?php
$cantidad = array(
        ["INFORMÁTICA",500],
        ["LENGUA",300],
        ["MATEMÁTICAS",300],
        ["INGLÉS",400]
)
?>

<table>
    <tr>
        <th>Texto</th>
        <th>Buscar</th>
    </tr>

    <tr>
        <td><?= $cantidad[$_REQUEST["dep"]][0] ?></td>
        <td><?= $cantidad[$_REQUEST["dep"]][1] . '€' ?></td>
    </tr>



</table>
<br><br>
<a href="form_dep.php">Volver</a>

<?php include "../../../pie.inc" ?>
