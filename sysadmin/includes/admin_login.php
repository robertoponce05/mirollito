<?php
include('db.php');

if (isset($_POST['loginsys'])) {
    
    $user = $_POST['user'];
    $pass = $_POST['pass'];
    

    $query = "SELECT * FROM sysadmin WHERE usuario='$user' and pass='$pass' and activo=1";

    $result = mysqli_query($conn, $query);
    $filas = mysqli_num_rows($result);
    if ($filas > 0) {
        $_SESSION['message'] = 'Sesión iniciada con éxito';
        $_SESSION['message_type'] = 'success';
        echo 'sesión iniciada';
        $_SESSION['user'] = $user;
        $query2="SELECT nivel FROM sysadmin WHERE usuario='$user' and pass='$pass'";
        $result2 = mysqli_query($conn, $query2);
        $row=mysqli_fetch_array($result2);
        $_SESSION['nivel']=$row['nivel'];
        echo $_SESSION['nivel'];
        header("location:../sysadmin.php");
    } else {
        $_SESSION['message'] = 'Datos incorrectos';
        $_SESSION['message_type'] = 'danger';
        echo 'usuario no encontrado';
        header("location:../index.php");
    }
    if ($user == "") {
        $_SESSION['message'] = 'Debes agregar un correo o número para ingresar';
        $_SESSION['message_type'] = 'danger';
        echo 'usuario no proporcionado';
        header("location:../index.php");
    } else {
        if ($pass == "") {
            $_SESSION['message'] = 'Ingresa tu contraseña';
            $_SESSION['message_type'] = 'danger';
            echo 'contraseña no proporcionada';
            header("location:../index.php");
        }
    }
}
