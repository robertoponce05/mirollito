<?php 
    include('db.php');
    error_reporting(0);
    $varsession = $_SESSION['user'];

    if($varsession == null || $varsession = ''){
        $_SESSION['message'] = 'Primero debes iniciar sesión';
        $_SESSION['message_type'] = 'warning';
        
        header('location:../sysadmin/');
        die();
        
    }
    session_destroy();
    header('Location:../');
    
?>