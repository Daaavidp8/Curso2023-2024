<?php include "../../../cabecera.inc"?>
<link rel="stylesheet" href="./departamentos.css">
</head>
<body>
<form action="presupuesto.php" method="post">
    <label for="dep">Tipo de libro</label>
    <select id="dep" name="dep">
        <option value="0" selected>INFORMÁTICA</option>
        <option value="1">LENGUA</option>
        <option value="2">MATEMÁTICAS</option>
        <option value="3">INGLÉS</option>
    </select><br>

    <input type="submit" value="Enviar">

</form>
<?php include "../../../pie.inc"?>
