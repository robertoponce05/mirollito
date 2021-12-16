<?php
include('db.php');
if ($_SESSION['nivel'] == 3) {
    $_SESSION['message'] = 'No tienes los permisos para realizar esta acción';
    $_SESSION['message_type'] = 'warning';
    header("location:../empleados.php");
} else {
    $name = $_POST['nombre'];
    $ape = $_POST['apellido'];
    $user = $_POST['usuario'];
    $rol = $_POST['rol'];
    $pass = $_POST['pass'];
    $repass = $_POST['repass'];

    if ($pass == $repass && strlen($pass) > 5 && $rol < 4) {
        $buscar = "SELECT usuario FROM sysadmin WHERE usuario='$user'";
        $rest = mysqli_query($conn, $buscar);
        $num = mysqli_num_rows($rest);
        if ($num > 0) {
            echo 'Usuario existente';
            $_SESSION['message'] = 'El usuario ya existe, elige otro nombre de usuario';
            $_SESSION['message_type'] = 'warning';
        } else {
            $query = "INSERT INTO sysadmin (nombre,apellido,usuario,pass,nivel) VALUES ('$name','$ape','$user','$pass','$rol')";
            $result = mysqli_query($conn, $query);
            if ($result) {
                echo $query;
                $_SESSION['message'] = 'Usuario añadido con éxito';
                $_SESSION['message_type'] = 'success';
            } else {
                echo $query;
                $_SESSION['message'] = 'No se pudo agregar el usuario, intenta más tarde';
                $_SESSION['message_type'] = 'warning';
            }
        }
    } else {
        $_SESSION['message'] = 'La contraseña no coincide';
        $_SESSION['message_type'] = 'warning';
    }
    header('Location:../empleados.php');
}
