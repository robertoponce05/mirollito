<?php
include("db.php");

if (isset($_POST['registra'])) {
    $nombre = $_POST['nombre'];
    $first = $_POST['pape'];
    $second = $_POST['sape'];
    $correo = $_POST['mail'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    $celu = $_POST['numero'];