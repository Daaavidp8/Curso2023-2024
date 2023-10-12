<?php include "../../../cabecera.inc" ?>
</head>
<body>
<form action="result_libros.php" method="post">
    <h1>Buscador de libros</h1>
    <label for="busqueda">Texto de Busqueda: </label>
    <input type="text" id="busqueda" name="busqueda"/>
    <br>

    <label for="site">Buscar en: </label>
    <input type="radio" id="site" name="site" value="1" checked>Titulo del libro
    <input type="radio" id="site" name="site" value="2">Titulo del autor
    <input type="radio" id="site" name="site" value="3">Editorial
    <br>

    <label for="type">Tipo de libro</label>
    <select id="type" name="type">
        <option value="1" selected>Narrativa</option>
        <option value="2">Libros de Texto</option>
        <option value="3">Guías y mapas</option>
    </select>
    <br>

    <input type="submit" value="Buscar">
</form>

<?php include "../../../pie.inc" ?>
