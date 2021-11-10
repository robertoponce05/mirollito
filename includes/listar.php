<?php
session_start();
if (isset($_POST['id'])) {
    if (!isset($_SESSION['nombre'])) {
        header("location:../login.php");
        $_SESSION['message'] = 'Primero debes iniciar sesión';
        $_SESSION['message_type'] = 'info';
    } else {
        if (isset($_SESSION['car'])) {
            (int)$car = $_SESSION['car'];
            (int)$i = $_SESSION['i'];
            $list = array();
            $list = $_SESSION['list'];
            unset($_SESSION['list']);
        } else {
            (int)$car = 0;
            (int)$i = 0;
            $list = array();
        }
        (int)$cantidad = $_POST['cantidad'];
        (int)$car = (int)$car + (int)$cantidad;
        (int)$i = (int)$i + 1;
        (int)$id = $_POST['id'];

        if (array_key_exists((int)$id, $list)) {
            (int)$temp = (int)$list[(int)$id];
            (int)$temp = (int)$temp + (int)$cantidad;
            $list[(int)$id] = (int)$temp;
        } else {
            $list[(int)$id] = $cantidad;
        }




        $_SESSION['list'] = $list;
        (int)$_SESSION['car'] = $car;
        (int)$_SESSION['i'] = $i;
        $_SESSION['messag'] = 'Añadido al carrito';
        $_SESSION['message_typ'] = 'success';
        header("location:../menu.php");
    }
} 

