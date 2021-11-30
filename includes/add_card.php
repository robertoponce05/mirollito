<?php 
include("db.php");
if(isset($_SESSION['idusuario'])){
    echo '';


if(isset($_POST['aceptar']) && isset($_POST['card']) && isset($_POST['nombre']) && isset($_POST['vencimiento']) && isset($_POST['cvv'])){
    echo 'tarjeta recibida';
    $ccard = $_POST['card'];
    $nombre = $_POST['nombre'];
    $fecha = $_POST['vencimiento'];
    $cvv = $_POST['cvv'];
    $alias = $_POST['alias'];
    $id = $_SESSION['idusuario'];
    
    if (isset($_POST['prede'])){ /* Predeterminar tarjeta */
        $prede=1;
    }else{
        $prede=0;
    }
    $datem=$fecha[2-3].$fecha[0-1];

    $query = "INSERT INTO tarjetas(id_client,ccard,alias,nombre,vencimiento,cvv,principal) VALUES ('$id', '$ccard', '$alias', '$nombre', '$datem', '$cvv', '$prede')";
    echo $query;
    /*$result=$conn->query($query);
    if($result){
        echo 'Se insertaron los datos';
        $_SESSION['message'] = 'Se agregó "'.$alias.'" correctamente.';
        $_SESSION['message_type'] = 'success';
    }else{
        echo 'no se inserto';
        $_SESSION['message'] = 'No se pudo agregar. Intenta más tarde.';
        $_SESSION['message_type'] = 'warning';
    } */

}else{
    echo 'tarjeta mala';
}
/*echo $_SESSION['idusuario'];*/
}
/*header('Location:../cuenta.php?pill=3');*/
?>
