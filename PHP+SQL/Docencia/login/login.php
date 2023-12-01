<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <style>
        .card {
            background-color: #333; /* Cambia el color de fondo de la tarjeta */
            border: 1px solid #fff; /* Añade un borde blanco a la tarjeta */
        }

        .card-header {
            background-color: #000;
            color: white;
        }

        .btn-primary {
            background-color: #000;
            border-color: #fff;
        }

        .btn-primary:hover {
            background-color: #333;
            border-color: black;
        }

        .form-group{
            color: white;
        }
    </style>
</head>
<body>

<?php
session_start();

include_once "../conexion.php";

$conexion = new Conexion();


// true -> iniciar Sesion
// false -> Registrar
$modo = isset($_REQUEST['modo']) ? $_REQUEST['modo'] : null;




if($_SERVER["REQUEST_METHOD"] === "POST"){

    $username = $_REQUEST['username'];
    $passwd = $_REQUEST['password'];

    // iniciar Sesion
    if (isset($_REQUEST['iniciarsesion'])){
        $comprobado = comprobar_login($username,$passwd);
        var_dump($comprobado);
        if ($comprobado){
            $_SESSION['login'][] = array();
            header("Location: ../index.php");
        }
    }

    if (isset($_REQUEST['registrar'])){
        $valido = validar_credenciales($username,$passwd);
        if ($valido){
            $passwd = password_hash($passwd,PASSWORD_DEFAULT);

            $insertuser = $conexion->conectar()->prepare("INSERT INTO login VALUES(:user, :passwd)");
            $insertuser->bindParam(":user",$username);
            $insertuser->bindParam(":passwd",$passwd);

            try {
                $insertuser->execute();
            }catch (Exception $e){
                die($e->getMessage());
            }
            header("Location: login.php?modo=0");
        }
    }
}

function validar_credenciales($username,$passwd) {
    // valido usuario

    global $conexion;
    $select = $conexion->conectar()->prepare("Select username FROM login");
    try {
        $select->execute();
    }catch (Exception $error){
        die($error->getMessage());
    }
    foreach($select as $nameusers){
        if ($nameusers == $username){
            return false;
        }
    }

    // validar contraseña

    if (strlen($passwd) < 5){
        return false;
    }
    $patterns = ["%[()#~½¬{}\[\]\\|\"*+\-_.:,;¨!^`´]%","1234567890","qwertyuiopasdfghjklñzxcvbnmç","QWERTYUIOPASDFGHJKLÑZXCVBNMÇ"];
    foreach ($patterns as $pattern){
        if (!preg_match($pattern,$passwd)){
            return false;
        }
    }
    return true;


}
function comprobar_login($username,$passwd) {
    global $conexion;
    $select = $conexion->conectar()->prepare("Select passwd FROM login WHERE username=:user");
    $select->bindParam(":user",$username);
    try {
        $select->execute();
    }catch (Exception $error){
        die($error->getMessage());
    }

    foreach($select as $contrasena){
        if (password_verify($passwd,$contrasena[0])){
            return true;
        }
    }

    return false;
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header color-white">
                    <h3 class="text-center"><?php
                        if ($modo){
                            ?>
                            Iniciar Sesión
                        <?php }else{ ?>
                            Registrar Usuario
                        <?php } ?></h3>
                </div>
                <div class="card-body">
                    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
                        <div class="form-group">
                            <label for="name">Username</label>
                            <input type="text" name="username" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="passwd">Password</label>
                            <input type="password" name="password" id="passwd" class="form-control" required>
                        </div>
                        <?php
                        if ($modo){
                        ?>
                            <button type="submit" class="btn btn-primary btn-block" name="iniciarsesion">Iniciar Sesión</button>
                            <p>Aun no tienes una cuenta?</p><a href="login.php?modo=0">Registrate</a>
                        <?php }else{ ?>
                            <button type="submit" class="btn btn-primary btn-block" name="registrar">Registrar Usuario</button>
                            <a href="login.php?modo=1">Iniciar Sesion</a>
                        <?php } ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
