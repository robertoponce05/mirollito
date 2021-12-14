<?php
include('../../includes/db.php');
date_default_timezone_set("America/Mexico_City");
$iduser = $_SESSION['idusuario'];
$tipopedido = $_SESSION['envio'];

$total = $_SESSION['total'];
echo 'ID USER: ' . $iduser;
if ($tipopedido == 1 and $_POST['check-metodo'] == 'efectivo') {
    $tipopedido = 4;
} elseif ($tipopedido == 1 and (int)$_POST['check-metodo'] > 0) {
    $tipopedido = 3;
} elseif ($tipopedido == 2 and (int)$_POST['check-metodo'] > 0) {
    $tipopedido = 1;
} elseif ($tipopedido == 2 and (int)$_POST['check-metodo'] == 'efectivo') {
    $tipopedido = 2;
}
if (isset($_SESSION['list'])) {
    $lista = array();
    $lista = $_SESSION['list'];
} else {
    header("location:/");
}
//creando pedido en tabla pedidos
if (isset($_POST['check-metodo'])) {
    $metodo_pago = $_POST['check-metodo'];
    $iduser = $_SESSION['idusuario'];
} else {
    //header("location:/");
}
$date = date('Y-m-d H:i:s');


if (isset($_POST['notas']) and $_POST['notas'] != "") {
    $notas = $_POST['notas'];
    if (isset($_POST['id_dir']) and $_POST['id_dir'] != "") {
        $id_dir = $_POST['id_dir'];
        $query = "INSERT INTO pedidos(id_cliente,estatus,notas,tipo_pedido, id_dir, fecha_pedido,total) VALUES ($iduser,1,'$notas','$tipopedido',$id_dir,'$date',$total)";
    } else {
        $query = "INSERT INTO pedidos(id_cliente,estatus,notas,tipo_pedido, fecha_pedido,total) VALUES ($iduser,1,'$notas','$tipopedido','$date',$total)";
    }
} elseif (isset($_POST['id_dir']) and $_POST['id_dir'] != "") {
    $id_dir = $_POST['id_dir'];
    $query = "INSERT INTO pedidos(id_cliente,estatus,tipo_pedido,id_dir,fecha_pedido,total) VALUES ($iduser,1,$tipopedido,$id_dir,'$date',$total)";
} else {
    $query = "INSERT INTO pedidos(id_cliente,estatus,tipo_pedido, fecha_pedido,total) VALUES ($iduser,1,'$tipopedido','$date',$total)";
}

echo $query;
echo "<br>";
$result = mysqli_query($conn, $query);
$idpedido = mysqli_insert_id($conn);
if (!$result) {
    $_SESSION['message'] = 'Ocurrió un error, por favor intenta más tarde';
    $_SESSION['message_type'] = 'warning';
    echo 'error';
    //header("location:../login.php");
    die('Ocurrió un error, por favor intenta más tarde');
}
echo 'ID PEDIDO = ' . $idpedido;
//metodo para insertar en tabla productos_vendidos
if (isset($idpedido)) {
    $lista = array();
    $lista = $_SESSION['list'];
} else {
    //header("location:/");
}
//$idpedido=$_SESSION['idventa'];
$ids = "";
$query = "SELECT * FROM productos";
$result_clientes = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result_clientes)) {
    if ((array_key_exists((int)$row['id_item'], $lista))) {
        //creando query (id,cantidad,idpedido de la tabla pedidos)
        $ids = $ids . "(" . $row['id_item'] . "," . $lista[(int)$row['id_item']] . "," . $idpedido . "),";
    }
}
$ids = trim($ids, ',');
$query = "INSERT INTO productos_vendidos (id_producto,cantidad,id_pedido) VALUES $ids ";
echo $query;
$result = mysqli_query($conn, $query);
$idpedido = mysqli_insert_id($conn);
if (!$result) {
    $_SESSION['message'] = 'Ocurrió un error, por favor intenta más tarde';
    $_SESSION['message_type'] = 'warning';
    echo 'error';
    sleep(5);
    header("location:../../carrito.php");
    die('Ocurrió un error, por favor intenta más tarde');
}
unset($_SESSION['list']);
unset($_SESSION['car']);
sleep(5);
$_SESSION['message'] = 'Pedido generado';
$_SESSION['message_type'] = 'success';
header("location:../../cuenta.php?pill=2");
unset($ids);
