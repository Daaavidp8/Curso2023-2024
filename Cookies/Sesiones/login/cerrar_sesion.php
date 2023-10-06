<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
</head>
<body>
<?php

    unset($_SESSION['loginusu']);
    session_destroy();
    header("Location: ./login.php");
?>
</body>
</html>
