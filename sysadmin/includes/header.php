<?php 
    
    
    $varsession = $_SESSION['user'];

    if($varsession == null || $varsession = ''){
        $_SESSION['message'] = 'Primero debes iniciar sesión';
        $_SESSION['message_type'] = 'warning';
        
        header('location:../sysadmin/');
        die();
        
    }

?>


<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title><?php
        if($in==0){
            echo 'SysAdmin: Bienvenido';
        }else if($in==1){
            echo 'SysaAdmin: Productos';
        }else if($in==2){
            echo 'SysAdmin: Pedidos';
        }else if($in==3){
            echo 'SysAdmin: Clientes';
        }else if($in==4){
            echo 'SysAdmin: Empleados';
        }echo 'SysAdmin'
    ?></title>

</head>

<body>

    <div class="navegar">
        <ul class="nav justify-content-center" style="background-color: #681212; padding: 10px;">
            <img src="../img/logo.png" class="img-fluit logo_sushi" alt="Logo">
            <li class="nav-item nav_color_text">Mi Rollito - Admin</li>
        </ul>
    </div>
    <div class="container-fluid nomargin">
    <div class="container-fluid nomargin">
        <div class="row nomargin ">
            <div class="nav flex-column col-4 col-md-2 fullHeight">
                
                <a class="nav-link active position-relative nav_color_text" aria-current="page" href="/sysadmin/sysadmin.php">Home
                <?php 
                    if($in==0){
                        echo '<img class="position-absolute top-0 start-100" src="img/selector.png" alt=""></a><!--esta entrando-->';
                    }else{
                        echo '</a> <!--esta entrando-->';
                    }
                ?>
                <a class="nav-link nav_color_text position-relative" href="/sysadmin/productos.php">Productos
                <?php 
                    if($in==1){
                        echo '<img class="position-absolute top-0 start-100" src="img/selector.png" alt=""></a>';
                    }else{
                        echo '</a>';
                    }
                ?>
                <a class="nav-link nav_color_text position-relative" href="/sysadmin/pedidos.php" style="margin-top: 10px;">Pedidos
                <?php 
                    if($in==2){
                        echo '<img class="position-absolute top-0 start-100" src="img/selector.png" alt=""></a>';
                    }else{
                        echo '</a>';
                    }
                ?>
                <a class="nav-link nav_color_text position-relative" href="/sysadmin/clientes.php">Clientes
                <?php 
                    if($in==3){
                        echo '<img class="position-absolute top-0 start-100" src="img/selector.png" alt=""></a>';
                    }else{
                        echo '</a>';
                    }
                ?>
                <a class="nav-link nav_color_text position-relative" href="/sysadmin/empleados.php">Empleados
                <?php 
                    if($in==4){
                        echo '<img class="position-absolute top-0 start-100" src="img/selector.png" alt=""></a>';
                    }else{
                        echo '</a>';
                    }
                ?>
                <a class="nav-link position-absolute bottom-0" style="color: #ffffff; margin-bottom: 18px; font-size: 19px;" href="includes/logout.php" tabindex="-1">Cerrar sesión
                </a>

            </div>