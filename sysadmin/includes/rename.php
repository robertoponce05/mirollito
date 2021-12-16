<?php
include('db.php');
if($_SESSION['nivel']==3){
    $_SESSION['message'] = 'No tienes los permisos para realizar esta acción';
    $_SESSION['message_type'] = 'warning';
    header("location:../clientes.php");
}else{
$name = $_POST['nombre'];
$p_ape = $_POST['p_ape'];
$s_ape = $_POST['s_ape'];
$tel = $_POST['tel'];
$mail = $_POST['mail'];
$idusu = $_POST['idusu'];
$query = "UPDATE clientes SET nombre='$name', p_apellido='$p_ape', s_apellido='$s_ape', telefono='$tel', correo='$mail' WHERE idusuario=$idusu";
echo $query;
$rest = mysqli_query($conn, $query);
if ($rest) {
    echo 'Añadida la direccion ';
    $_SESSION['message'] = 'Usuario actualizado correctamente';
    $_SESSION['message_type'] = 'success';
} else {
    echo 'algo falló';
    echo '<br>' . $query;
    $_SESSION['message'] = 'Hubo un error, intenta más tarde.';
    $_SESSION['message_type'] = 'warning';
}
header('Location:../clientes.php');
}