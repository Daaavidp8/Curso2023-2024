<?php include "./cabecera.inc" ?>


<table>
    <?php
        $contador = 0;
        echo "<tr>";
        echo "<th>Partidos:</th>";
        for ($i = 0; $i < $_REQUEST['numeropartidos'];$i++){
            echo "<th>" . $_REQUEST['partidos'][$i] . "</th>";
        }
        echo "</tr>";

        echo "<tr style='background-color: #eee;'>";
        echo "<th>Votos:</th>";
        for ($i = 0; $i < $_REQUEST['numeropartidos'];$i++){
            echo "<td>" . $_REQUEST['votos'][$i] . "</td>";
        }
        echo "</tr>";

        $escanyos = [];

        for ($i = 0;$i < $_REQUEST['numeroescanos'];$i++){
            for ($p = 0; $p < $_REQUEST['numeropartidos'];$p++){
                $escanyos[] = round($_REQUEST['votos'][$p] /  ($i + 1),0);
            }
        }
        rsort($escanyos);
        $escanyos = array_slice($escanyos,0,$_REQUEST['numeroescanos']);

        for ($i = 0;$i < $_REQUEST['numeroescanos'];$i++){
            echo "<tr><td>Escaño " . $i+1 . "</td>";
            for ($p = 0; $p < $_REQUEST['numeropartidos'];$p++){
                $numero = round($_REQUEST['votos'][$p] /  ($i + 1),0);
                if (in_array($numero,$escanyos)){
                    echo "<td style='background-color: yellow;'>";
                }else{
                    echo "<td>";
                }
                echo $numero;
                echo "</td>";
            }
            echo "</tr>";
        }
    ?>
</table>


<?php include "./pie.inc" ?>
