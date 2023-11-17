<?php
ini_set('display_errors', 1);

$vaciar = $pdo->prepare("TRUNCATE TABLE video");
try {
$vaciar->execute();
}catch (Exception $error){
echo $error;
}?>