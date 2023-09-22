<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>$Title$</title>
    <style>
        body {
            background-color: black;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .slideInDown {
            -webkit-animation-name: slideInDown;
            animation-name: slideInDown;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @-webkit-keyframes slideInDown {
            0% {
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
                visibility: visible;
            }
            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }
        @keyframes slideInDown {
            0% {
                -webkit-transform: translateY(-100%);
                transform: translateY(-100%);
                visibility: visible;
            }
            100% {
                -webkit-transform: translateY(0);
                transform: translateY(0);
            }
        }
        .fadeIn {
            -webkit-animation-name: fadeIn;
            animation-name: fadeIn;
            -webkit-animation-duration: 1s;
            animation-duration: 1s;
            -webkit-animation-fill-mode: both;
            animation-fill-mode: both;
        }
        @-webkit-keyframes fadeIn {
            0% {opacity: 0;}
            100% {opacity: 1;}
        }
        @keyframes fadeIn {
            0% {opacity: 0;}
            100% {opacity: 1;}
        }
        h1 {
            padding: 10px;
            background-color: orangered;
            text-align: center;
            color: white;
            border-radius: 5px;
            text-shadow: 0.1em 0.1em 0.2em black;
            border-style: solid;
            border-color: #962800;
        }

        p {
            padding: 10px;
            background-color: white;
            text-align: center;
            border-radius: 5px;
            font-style: oblique 40deg;
            text-shadow: 0.1em 0.1em 0.6em black;
            border-style: solid;
            border-color: rgb(128, 128, 128);
        }

        .dot {
            height: 100px;
            width: 100px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: 2s;
        }

        .dot:hover{
            height: 200px;
            width: 200px;
        }
        b{
            color: red;
            font-size: 1.2em;
        }
        #numeros{
            width: 30%;
        }
    </style>
</head>
<body>
<?php
    $nombre = "David";
    $anyo = 19;
    define("PI",3.14);
    $radio = 3.5;
?>

    <h1 class="slideInDown">Nombre y año de nacimiento</h1>
    <p class="fadeIn">Mi nombre es <?= $nombre?> y tengo <?= $anyo?> años</p>
    <p class="fadeIn">El radio del circulo es de <?=$radio**2*PI?></p>
    <div class="dot"></div>
    <p class="fadeIn" id="numeros">
        <?php
        for ($i=0; $i <= 100; $i++){
            echo $i%2==0 ? '<b>' . $i . '</b>' : $i;
            echo $i==100 ? '' : ' ';
        }
        ?>
    </p>

    <p class="fadeIn" id="numeros">
        <?php
        $i = 10;
        while($i >= 0){
            echo $i%2==0 ? '<b>' . $i . '</b>' : $i;
            echo $i==0 ? '' : ' ';
            $i--;
        }
        ?>
    </p>


</body>
</html>
