<?php

include("db.php");
if (isset($_POST['user'])) {
    $user = $_POST['usuario'];
    $pass = $_POST['password'];
    if (is_numeric($user)){
        $query = "SELECT * FROM clientes WHERE telefono='$user' and pass='$pass' and activo>0";
        echo 'numero true';
    }else{
        $query = "SELECT * FROM clientes WHERE correo='$user' and pass='$pass' and activo>0";
        echo 'numero false';
    }

    
    $result = mysqli_query($conn, $query);
    $result2 =  mysqli_fetch_array($result);
    $filas = mysqli_num_rows($result);
    
    if ($filas > 0) {
        $_SESSION['message'] = 'Sesión iniciada con éxito';
        $_SESSION['message_type'] = 'success';
        echo 'sesión iniciada';
        $_SESSION['nombre']= $result2['nombre'];
        $_SESSION['idusuario']=$result2['idusuario'];
        header("location:../menu.php?pill=0");

    } else {
        $_SESSION['message'] = 'Datos incorrectos';
        $_SESSION['message_type'] = 'danger';
        echo 'usuario no encontrado';
        header("location:../login.php");
    }
    if ($user == "") {
        $_SESSION['message'] = 'Debes agregar un correo o número para ingresar';
        $_SESSION['message_type'] = 'danger';
        echo 'usuario no proporcionado';
        header("location:../login.php");
    } else {
        if ($pass == "") {
            $_SESSION['message'] = 'Ingresa tu contraseña';
            $_SESSION['message_type'] = 'danger';
            echo 'contraseña no proporcionada';
            header("location:../login.php");
        }
    }
}
