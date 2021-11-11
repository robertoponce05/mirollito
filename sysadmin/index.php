<?php include('includes/db.php');?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

    <title>Admin Mi Rollito: Login</title>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
</head>

<body>
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']); unset($_SESSION['message_type']);
    } ?>

    <div class="navegar">
        <ul class="nav justify-content-center" style="background-color: #681212; padding: 10px;">
            <img src="../img/logo.png" class="img-fluit logo_sushi" alt="Logo">
            <li class="nav-item nav_color_text">Mi Rollito - Admin</li>
        </ul>
    </div>
    
    <div class="container-fluid">
        
        <div class="row fullHeight bg_contenido">
            
            <div class="position-relative">
                <div class="position-absolute top-0 start-50 translate-middle-x">
                    <h3 class="salto">Bienvenido al sysadmin de Rollito</h3>
                    <p class="salto text-center">Introduce tu usuario para acceder</p>
                    <div class="container position-relative">
                        <div class="position-absolute top-0 start-50 translate-middle-x">
                            <form action="includes/admin_login.php" method="POST">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="floatingInput" name="user" placeholder="Ingresa tu usuario">
                                    <label for="floatingInput">Usuario</label>
                                </div>
                                <div class="form-floating salto">
                                    <input type="password" class="form-control" id="floatingPassword" name="pass" placeholder="Password">
                                    <label for="floatingPassword">Contraseña</label>
                                </div>
                                <div class="col salto">
                                    <input type="submit" class="btn enviar_sesion btn-success" name="loginsys" value="Iniciar sesión">                                    
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    </div>
</body>

</html>