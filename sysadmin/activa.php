<?php
include('includes/db.php');
if (isset($_GET['action'])) {
    $id = $_GET['id'];
    $action = $_GET['action'];
    $query = "UPDATE clientes SET activo=$action WHERE idusuario=$id";
    echo $query;
    $rest = mysqli_query($conn, $query);
    if ($rest) {
        echo 'Añadida la direccion ';
        $_SESSION['message'] = 'Cliente actualizado';
        $_SESSION['message_type'] = 'success';
    } else {
        echo 'algo falló';
        echo '<br>' . $query;
        $_SESSION['message'] = 'Hubo un error, intenta más tarde.';
        $_SESSION['message_type'] = 'warning';
    }
    
}header('Location:clientes.php');
