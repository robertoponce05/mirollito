<?php
include("db.php");
if ($_SESSION['nivel'] == 3) {
    $_SESSION['message'] = 'No tienes los permisos para realizar esta acción';
    $_SESSION['message_type'] = 'warning';
    header("location:../productos.php");
} else {
    if (isset($_POST['habilitar'])) {
        $habilitar = 0;
    } else {
        $habilitar = 1;
    }


    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $stock = $_POST['stock'];

    $categoria = $_POST['categoria'];

    $query = "INSERT INTO productos(titulo,detalle,precio,habilitar,stock,categoria) VALUES ('$titulo','$descripcion','$precio','$habilitar','$stock', '$categoria')";
    echo $query;
    $result = $conn->query($query);

    if ($result) {
        echo 'Se insertaron los datos';
        $_SESSION['message'] = 'Se agregó "' . $titulo . '" correctamente.';
        $_SESSION['message_type'] = 'success';
    } else {
        echo 'no se inserto';
        $_SESSION['message'] = 'No se pudo agregar. Intenta más tarde.';
        $_SESSION['message_type'] = 'warning';
    }
    header('Location:../productos.php');
}
