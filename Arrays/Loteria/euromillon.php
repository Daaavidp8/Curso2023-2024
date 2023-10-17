<?php include "./cabecera.inc"?>
<?php

?>
<?php include "./loteria.inc" ?>

<div>
<?php
echo "<h1>Euromillon: </h1>";
?>

    <p>
         <?php
             loteria(true);
             echo '<b>-</b>';
             loteria(false);
        ?>
    </p>
</div>
<?php include "../../pie.inc"?>
