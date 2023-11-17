<?php include "../cabecera.inc"?>

<link rel="stylesheet" href="./tenis.css">
</head>
<body>

<?php
//3. Simular un partido de tenis: utilizando la función random para que vaya dandole los puntos de
// manera aleatoria a cada jugador.


$jugadores = [0,0];
$puntos = [0,15,30,40];
$juegos = [0,0];
$mostrarPuntos = ["",""];
$mostrarJuegos = ["",""];
$juegoGanado = false;
$mostrarPuntosDeJuego = [];

function ganador() {
    return rand(0,1);
}
?>

<fieldset> <legend><b>Partido De Tenis</b></legend>
    <table>
        <?php

        do{
                // Se llama a la funcion y si da 0 es punto para el jugador 1 y si da 1 para el jugador 2
                ganador() === 0 ? $jugadores[0]++ : $jugadores[1]++;

                // Guardo las puntuaciones de cada uno
                $mostrarPuntos[0] .= '<td>' . $puntos[$jugadores[0]] . '</td><br/>';
                $mostrarPuntos[1] .= '<td>' . $puntos[$jugadores[1]] . '</td><br/>';

                // Cuando llegan a 40 alguno de los 2 se suma un juego al ganador,
                //  se resetea a 0 y comienza un nuevo juego
                if ($jugadores[0] >= 3 || $jugadores[1] >= 3){

                    $jugadores[0] >= 3 ? $juegos[0]++ : $juegos[1]++;

                    $jugadores[0] = 0;
                    $jugadores[1] = 0;

                    $juegoGanado = true;

                    // Se guardan los puntos de cada juego de cada jugador en una array bidimensional
                    $mostrarPuntosDeJuego[] = array($mostrarPuntos[0], $mostrarPuntos[1]);

                    $mostrarPuntos[0] = '';
                    $mostrarPuntos[1] = '';
                }

                if ($juegoGanado){

                    $mostrarJuegos[0] .= '<td>' . $juegos[0] . '</td><br/>';
                    $mostrarJuegos[1] .= '<td>' . $juegos[1] . '</td><br/>';

                    $juegoGanado = false;
                }

        }while ($juegos[0] != 6 && $juegos[1] != 6);

        // Contador para saber cual es el ultimo juego
        $contador = $juegos[0] + $juegos[1];


            // Muestra de puntuaciones
            echo '<tr>
                        <th>Nadal</th>'
                         . $mostrarPuntosDeJuego[$contador - 1][0] .
                  '</tr>';
            echo '<tr>
                        <th>Federer</th>'
                          . $mostrarPuntosDeJuego[$contador -1][1] .
                  '</tr>';
            echo '<tr> 
                        <th>Nadal</th>'
                        . $mostrarJuegos[0] .
                 '</tr>';
            echo '<tr>
                        <th>Federer</th>'
                        . $mostrarJuegos[1] .
                '</tr>';
        ?>
    </table>
</fieldset>
<?php include "../pie.inc"?>
