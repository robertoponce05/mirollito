<?php
include("db.php");
$id_tarjeta = $_POST['tarjeta'];
$id = $_SESSION['idusuario'];
if (isset($_SESSION['idusuario'])) {
    echo 'Sesión';
    if (isset($_POST['card'])&&$_POST['card']!='') {
        $ccard = $_POST['card'];
        echo $ccard;
    } else {
        $querytar = "SELECT * FROM tarjetas WHERE id_client= '$id' AND id_card='$id_tarjeta'";
        $resulta = mysqli_query($conn, $querytar);
        $rowed = mysqli_fetch_array($resulta);
        $ccard = $rowed['ccard'];
        echo $querytar.'/n';
        echo $ccard;
    }

    if (isset($_POST['aceptar']) && isset($_POST['nombre']) && isset($_POST['vencimiento']) && isset($_POST['cvv'])) {
        echo 'tarjeta recibida';

        $nombre = $_POST['nombre'];
        $fecha = $_POST['vencimiento'];
        $cvv = $_POST['cvv'];
        $alias = $_POST['alias'];
        

        if (isset($_POST['predeterminada'])) { /* Predeterminar tarjeta */
            $prede = 1;
            $query = "SELECT * FROM tarjetas WHERE id_client= '$id' AND principal=1";
            $result = mysqli_query($conn, $query);
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
                $query_mod = "UPDATE tarjetas SET principal='1' WHERE id_card='$id_tarjeta'";
                echo '/n'.$query_mod;
                /*$resultado = $conn->query($query_mod);*/
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
        } else {
            $prede = 0;
        }

        $datem = $fecha . '-00';/*formatear a date YYYY-mm-dd*/

        $query = "UPDATE tarjetas SET ccard='$ccard',alias='$alias',nombre='$nombre',
        vencimiento='$datem',cvv='$cvv',principal='$prede' WHERE id_card='$id_tarjeta'";
        echo $query;
        $result = $conn->query($query);
        if ($result) {
            echo 'Se actualizó la tarjeta';
            $_SESSION['message'] = 'Se actualizó la tarjeta "' . $alias . '" correctamente.';
            $_SESSION['message_type'] = 'success';
        } else {
            echo 'no se inserto';
            $_SESSION['message'] = 'No se pudo agregar. Intenta más tarde.';
            $_SESSION['message_type'] = 'warning';
        }
    } else {
        echo 'tarjeta mala';
    }
    /*echo $_SESSION['idusuario'];*/
}
header('Location:../cuenta.php?pill=3');
