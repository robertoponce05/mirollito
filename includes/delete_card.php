<?php
include("db.php");
$id = $_SESSION['idusuario'];
$id_tarjeta = $_GET['i'];
$query = "SELECT * FROM tarjetas WHERE id_client= '$id' AND id_card='$id_tarjeta'";
$result = mysqli_query($conn, $query);
$rowed = mysqli_fetch_array($result);
$alias = $rowed['alias'];
$filas = mysqli_num_rows($result);
if ($filas > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $id_mod = $row['id_card'];
        $query_mod = "UPDATE tarjetas SET principal='0' WHERE id_card='$id_mod'";
        $resultado = $conn->query($query_mod);
        if ($result) {
            echo 'predeterminados limpiados';
            /*$_SESSION['message'] = 'Producto editado correctamente.';
                    $_SESSION['message_type'] = 'success';*/
        } else {
            echo 'algo falló en la limpieza';
            /*$_SESSION['message'] = 'Hubo un error, intenta más tarde.';
                    $_SESSION['message_type'] = 'warning';*/
        }
    }
    $query = "UPDATE tarjetas SET estado='0' WHERE id_card='$id_tarjeta'";
    $result = $conn->query($query);
    if ($result) {
        echo 'Se eliminó la tarjeta';
        $_SESSION['message'] = 'Se ha eliminado la tarjeta "' . $alias . '" correctamente.';
        $_SESSION['message_type'] = 'success';
    } else {
        echo 'No se eliminó';
        $_SESSION['message'] = 'No se pudo eliminar. Intenta más tarde.';
        $_SESSION['message_type'] = 'warning';
    }
}
/*header('Location:../cuenta.php?pill=3');*/
