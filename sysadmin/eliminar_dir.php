<?php
include('includes/db.php');
if($_SESSION['nivel']==3){
    $_SESSION['message'] = 'Sección no disponible, asegura que tienes los permisos';
    $_SESSION['message_type'] = 'warning';
    header("location:sysadmin.php");
}else{
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    $query = "UPDATE direcciones SET habilitar=0 WHERE id_dir=$id";
    echo $query;
    $rest = mysqli_query($conn, $query);
    if ($rest) {
        echo 'Añadida la direccion ';
        $_SESSION['message'] = 'Dirección deshabilitada';
        $_SESSION['message_type'] = 'success';
    } else {
        echo 'algo falló';
        echo '<br>' . $query;
        $_SESSION['message'] = 'Hubo un error, intenta más tarde.';
        $_SESSION['message_type'] = 'warning';
    }
    
}
 header('Location:clientes.php');
}