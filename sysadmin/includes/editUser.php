<?php
include('db.php');
$name = $_POST['nombre'];
$ape = $_POST['apellido'];
$user = $_POST['usuario'];
$rol = $_POST['rol'];
$id = $_POST['id'];

if (isset($_POST['pass']) && isset($_POST['repass']) && $_POST['repass'] != "" && $_POST['pass'] != "") {
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];
    if ($pass == $repass && strlen($pass) > 5 && $rol < 4) {
        $buscar = "SELECT usuario FROM sysadmin WHERE usuario='$user'";
        $rest = mysqli_query($conn, $buscar);
        $num = mysqli_num_rows($rest);
        if ($num > 1) {
            echo 'Usuario existente';
            $_SESSION['message'] = 'El usuario ya existe, elige otro nombre de usuario';
            $_SESSION['message_type'] = 'warning';
        } else {
            $query = "UPDATE sysadmin SET nombre='$name',apellido='$ape',usuario='$user',pass='$pass',nivel='$rol' WHERE id_admin=$id";
            echo $query;
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo 'Actualizado';
                $_SESSION['message'] = 'Usuario actualizado con éxito';
                $_SESSION['message_type'] = 'success';
            } else {
                echo 'No se actualizó';
                $_SESSION['message'] = 'No se pudo actualizar el usuario, intenta más tarde';
                $_SESSION['message_type'] = 'warning';
            }
        }
    } else {
        echo 'Contraseña no coincide';
        $_SESSION['message'] = 'La contraseña no coincide';
        $_SESSION['message_type'] = 'warning';
    }
} else {
    $buscar = "SELECT usuario FROM sysadmin WHERE usuario='$user'";
    $rest = mysqli_query($conn, $buscar);
    $num = mysqli_num_rows($rest);
    if ($num > 1) {
        echo 'Usuario existente';
        $_SESSION['message'] = 'El usuario ya existe, elige otro nombre de usuario';
        $_SESSION['message_type'] = 'warning';
    } else {
        $query = "UPDATE sysadmin SET nombre='$name',apellido='$ape',usuario='$user',nivel='$rol' WHERE id_admin=$id";
        $result = mysqli_query($conn, $query);
            if ($result) {
                echo 'Actualizado';
                $_SESSION['message'] = 'Usuario actualizado con éxito';
                $_SESSION['message_type'] = 'success';
            } else {
                echo 'No se actualizó';
                $_SESSION['message'] = 'No se pudo actualizar el usuario, intenta más tarde';
                $_SESSION['message_type'] = 'warning';
            }
    }
}
header('Location:../empleados.php');
