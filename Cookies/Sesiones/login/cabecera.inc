<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>$Title$</title>
    <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<?php
session_start();
if (!isset($_SESSION['loginusu'])){
    header("Location: login.php");
}
?>