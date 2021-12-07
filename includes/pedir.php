<?php
include('db.php');
if (isset($_POST['check-envio'])){
    if($_POST['check-envio']=='domicilio'){
        $_SESSION['envio']=1;
        echo $_SESSION['envio'];
        header("location:/pedido");
    }
    if($_POST['check-envio']=='sucursal'){
        $_SESSION['envio']=2;
        echo $_SESSION['envio'];
        header("location:/pedido");
    }
}else{
    return 'error';
}