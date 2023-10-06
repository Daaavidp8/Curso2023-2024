<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" type="text/css" href="./login.css">
</head>
<body>



<form action="<?php echo $_SERVER["PHP_SELF"];?>" method="post">
    <fieldset>
        <legend>Iniciar Sesion</legend>
        <label>Nombre: <input type="text" name="user"></label><br>
        <label>Password: <input type="password" name="passwd"></label><br>
    <?php
    session_start();
    if (isset($_REQUEST['user']) && isset($_REQUEST['passwd'])){
        $login = $_REQUEST['user'] . ":" . $_REQUEST['passwd'];
        $file = "./usuarios.txt";
        $fp = fopen($file,"r");
        $encontrado = false;
        while (!feof($fp) && !$encontrado){
            $linea = fgets($fp);
            if (trim($linea) === $login){
                echo "entra";
                $encontrado = true;
                $_SESSION['loginusu'] = $login;
                header("Location: index.php");
            }
        }
        echo "<p style='color: red'>Usuario o contraseña incorrecto</p>";
    }
    ?>
        <input type="submit" value="Enviar">
    </fieldset>
</form>
</body>
</html>
