<?php
include('db.php');
date_default_timezone_set("America/Mexico_City");
if (isset($_POST['estatus']) and isset($_POST['pedido'])) {
    (int)$estatus = $_POST['estatus'];
    (int)$id_pedido = $_POST['pedido'];
    $estatus += 1;
    $queryEstado="SELECT status FROM status_ventas WHERE id_status = $estatus";
    $resEstado= $conn->query($queryEstado);
    $stringEstado=mysqli_fetch_array($resEstado);
    if ($estatus == 6) {
        $date = date('Y-m-d H:i:s');
        $query = "UPDATE pedidos SET estatus=$estatus, fecha_finalizado='$date' WHERE id_pedido=$id_pedido";
    }else{
        $query = "UPDATE pedidos SET estatus=$estatus WHERE id_pedido=$id_pedido";
    }
    $result = $conn->query($query);
    if ($result) {
        echo 'Se cambio a estatus ' . $stringEstado['status']. ' el pedido ' . $id_pedido;
        $_SESSION['message'] = 'Se cambio a estatus "' . $stringEstado['status']. '" al pedido #' . $id_pedido;
        $_SESSION['message_type'] = 'success';
        //header('location:/sysadmin/pedidos.php');
    } else {
        echo 'No se modificó el estatus';
        $_SESSION['message'] = 'No se modificó el estatus';
        $_SESSION['message_type'] = 'warning';
    }
    echo $query;
    unset($estatus);
    unset($id_pedido);
    header('location:/sysadmin/pedidos.php');
} elseif (isset($_POST['cancelar'])) {
    (int)$cancel = $_POST['cancelar'];
    echo 'ID para cancelar'. $cancel. '<br>';
    $date = date('Y-m-d H:i:s');
    $query = "UPDATE pedidos SET estatus=7, fecha_finalizado='$date' WHERE id_pedido=$cancel";
    echo $query;
    $result = $conn->query($query);
    if ($result) {
        echo $query;
        echo 'Se cancelo el pedido ' . $cancel;
        $_SESSION['message'] = 'Se canceló el pedido #' . $cancel;
        $_SESSION['message_type'] = 'success';
        unset($cancel);
        unset($id_pedido);
    } else {
        echo 'No se modificó el estatus';
        $_SESSION['message'] = 'Hubo un error, intenta más tarde.';
        $_SESSION['message_type'] = 'warning';
    }
    unset($cancel);
    header('location:/sysadmin/pedidos.php');
}
