<?php
session_start();
if (isset($_SESSION['car']) and (int)$_SESSION['car'] <= 0) {
    unset($_SESSION['car']);
    unset($_SESSION['list']);
} else {
    if (isset($_GET['del']) and $_GET['del']!='') {
        (int)$id = $_GET['del'];
        if (isset($_SESSION['list'])) {
            $car = $_SESSION['car'];
            $restar = $_GET['num'];
            $car = (int)$car - (int)$restar;
            if ((int)$car <= 0) {
                unset($car);
                unset($_SESSION['car']);
                unset($_SESSION['list']);
                $_SESSION['messag'] = 'Carrito vacío';
                $_SESSION['message_typ'] = 'success';
                header("location:../carrito.php");
                echo 'car menor o igual a cero';
            }else{
            $list = $_SESSION['list'];
            unset($_SESSION['list']);
            
            unset($list[(int)$id]);
            $_SESSION['list']=$list;
            (int)$_SESSION['car']=$car;
            echo 'entra';
            $_SESSION['messag'] = 'Producto eliminado';
            $_SESSION['message_typ'] = 'success';
            }header("location:../carrito.php");
        } else {
            echo 'Lista vacía';
        }
    } else {
        echo 'sin ID';
    }
}
/*echo 'qué pasó';
$_SESSION['list'] = $list;
(int)$_SESSION['car'] = $car;
foreach ($_SESSION['list'] as $key => $value) {
    // and print out the values
    echo 'The value of $_SESSION[' . "'" . $key . "'" . '] is ' . "'" . $value . "'" . ' <br />';
    
}*/
