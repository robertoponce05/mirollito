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

    $valida = "SELECT * FROM clientes WHERE correo='$correo' or telefono='$celu' and activo='1'";
    $result = mysqli_query($conn, $valida);
    $filas = mysqli_num_rows($result);
    if ($filas > 0) {
        $_SESSION['message'] = 'Existe una cuenta con los datos proporcionados';
        $_SESSION['message_type'] = 'warning';
        header("location:/sushi/signup.php");
    } else {
        if ($pass == $repass and strlen($celu) == 10 and strlen($nombre) != 0 and strlen($first) != 0 and strlen($correo) != 6) {
            $query = "INSERT INTO clientes(nombre,p_apellido,s_apellido,correo,telefono,pass,activo) VALUES ('$nombre','$first','$second','$correo','$celu','$pass','1')";
            $result = mysqli_query($conn, $query);
            if (!$result) {
                die('Ocurrió un error, por favor intenta más tarde');
            }
            $_SESSION['message'] = 'Registro realizado';
            $_SESSION['message_type'] = 'success';
            header("location:/sushi/login.php");
        }else{
            if ($pass != $repass) {
                $_SESSION['message'] = 'Las contraseñas no coinciden';
                $_SESSION['message_type'] = 'warning';
                header("location:/sushi/signup.php");
            } else if (strlen($celu) != 10) {
                $_SESSION['message'] = 'El celular debe ser a 10 dígitos';
                $_SESSION['message_type'] = 'warning';
                header("location:/sushi/signup.php");
            } else {
                $_SESSION['message'] = 'Ocurrio un error inesperado';
                $_SESSION['message_type'] = 'danger';
                header("location:/sushi/signup.php");
            }
        }
        
    }
    

    
}
