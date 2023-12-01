<?php
session_start();

if(!isset($_SESSION['login'])){
    header("Location: /Curso2023-2024/PHP+SQL/Docencia/login/login.php?modo=0");
}
?>