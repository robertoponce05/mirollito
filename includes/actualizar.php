<?php
include("db.php");

$idusuario = $_POST['id'];
$nombre = $_POST['nombre'];
$first = $_POST['pape'];
$second = $_POST['sape'];
$correo = $_POST['mail'];
// $pass = $_POST['pass'];
// $repass = $_POST['repass'];
$celu = $_POST['numero'];

$actualizar = "UPDATE clientes SET nombre='$nombre', p_apellido='$first', s_apellido='$second', correo='$correo', 
telefono='$celu' WHERE idusuario=$idusuario";

echo $actualizar;
$result = mysqli_query($conn, $actualizar);

if ($result) {
    echo "datos actualizados correctamente";
    $_SESSION['message'] = 'Datos de usuario actualizados';
    $_SESSION['message_type'] = 'success';
} else {
    echo "no fue posible actualizar";
    $_SESSION['message'] = 'Hubo un error, intenta más tarde.';
    $_SESSION['message_type'] = 'warning';
}
header('Location:../cuenta.php?pill=0');
