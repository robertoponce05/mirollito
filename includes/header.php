<!DOCTYPE html>
<html lang="es">
<?php
if (isset($_SESSION['nombre'])) {
    $nombre = $_SESSION['nombre'];
    $iduser=$_SESSION['idusuario'];
}
if (isset($_SESSION['car'])) {
    (int)$car = $_SESSION['car']; /*Variable para almacenar elementos del carrito*/
    $list = $_SESSION['list']; /** Listado de IDs de los productos */
    (int)$i = $_SESSION['i'];
} ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>Mi Rollito<?php
                        if ($page == 1)
                            echo ' - Inicio';
                        else if ($page == 2)
                            echo ': Menú';
                        else if ($page == 3)
                            echo ': Nosotros';
                        else if ($page == 4)
                            echo ': Inicia sesión';
                        else if ($page == 5)
                            echo ': Registro';
                        else if ($page == 6)
                            echo ': Cuenta';
                        else if ($page == 7)
                            echo ': Carrito';



                        ?></title>
</head>

<body style="background-color: #D3D3D3;">