<?php
include("db.php");

if (isset($_POST['alias'], $_POST['cp'], $_POST['colonia'], $_POST['municipio'], $_POST['exterior'])) {
    echo "Recibo datos ";
    $alias = $_POST['alias'];
    $cp = $_POST['cp'];
    $colonia = $_POST['colonia'];
    $muni = $_POST['municipio'];
    $ext = $_POST['exterior'];
    $int = $_POST['interior'];
    $ref = $_POST['referencias'];
    $id = $_POST['idusu'];
    $calle=$_POST['calle'];
    $query = "INSERT INTO direcciones (alias, cp, colonia,municipio,exterior,interior,
referencia, idusuario,calle) VALUES ('$alias','$cp','$colonia',
'$muni','$ext','$int','$ref','$id', '$calle')";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo 'Añadida la direccion ';
        $_SESSION['message'] = 'Dirección añadida';
        $_SESSION['message_type'] = 'success';
    } else {
        echo 'algo falló';
        echo '<br>' . $query;
        $_SESSION['message'] = 'Hubo un error, intenta más tarde.';
        $_SESSION['message_type'] = 'warning';
    }
} else {
    echo 'no hay datos, no se hizo nada';
}
header('Location:../clientes.php');