<?php include('includes/db.php');
$page = 6; ?>
<?php include("includes/header.php");
if ($nombre == null || $nombre = '') {
    $_SESSION['message'] = 'Primero debes iniciar sesión';
    $_SESSION['message_type'] = 'warning';

    header('location:../');
    die();
}
?>
<?php

include("includes/navbar.php");
?>
<?php

$query = "SELECT * FROM clientes WHERE idusuario='$iduser'";
$result = mysqli_query($conn, $query);
$result1 = mysqli_fetch_array($result);
?>

<body>
    <div id="wrapper">
        <div class="container bg_color">
            <div class="row">
                <div class="col-sm-12 col-md-3 col-lg-2 sidebar_cuenta sidebar_border">
                    <div class="ocultar">
                        <img class="border border-dark rounded-circle " style="width: 80px; margin: 5px; align-self: center;" src="img/user.png" alt="User">
                        <p style="font-size: 11px; font-style: italic;"><?php echo $result1['correo'] ?></p>
                    </div>

                    <ul class="nav nav-tabs sidebar_cuenta" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link boton_color <?php if (isset($_GET['pill']) and $_GET['pill'] == '0') {
                                                    echo 'show active';
                                                } ?>" id="perfil-tab" data-bs-toggle="tab" data-bs-target="#perfil" type="button" role="tab" aria-controls="home" aria-selected="true">Perfil</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link boton_color <?php if (isset($_GET['pill']) and $_GET['pill'] == '3') {
                                                    echo 'show active';
                                                } ?>" id="pago-tab" data-bs-toggle="tab" data-bs-target="#pago" type="button" role="tab" aria-controls="pago" aria-selected="false">Formas de pago</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link boton_color <?php if (isset($_GET['pill']) and $_GET['pill'] == '2') {
                                                    echo 'show active';
                                                } ?>" id="pedidos-tab" data-bs-toggle="tab" data-bs-target="#pedidos" type="button" role="tab" aria-controls="pedidos" aria-selected="false">Pedidos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link boton_color <?php if (isset($_GET['pill']) and $_GET['pill'] == '1') {
                                                    echo 'show active';
                                                } ?>" id="direcciones-tab" data-bs-toggle="tab" data-bs-target="#direcciones" type="button" role="tab" aria-controls="direcciones" aria-selected="false">Direcciones</button>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-12 col-md-9 col-lg-10 contenido_cuenta">
                    <div class="tab-content">
                        <div class="tab-pane <?php if (isset($_GET['pill']) and $_GET['pill'] == '0') {
                                                        echo 'show active'; unset($_GET['pill']);
                                                    } ?>" id="perfil" role="tabpanel" aria-labelledby="perfil-tab">
                            <?php include("includes/perfil.php"); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['pill']) and $_GET['pill'] == '3') {
                                                        echo 'show active'; unset($_GET['pill']);
                                                    } ?>" id="pago" role="tabpanel" aria-labelledby="pago-tab">
                            <?php include("includes/pago.php"); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['pill']) and $_GET['pill'] == '2') {
                                                        echo 'show active'; unset($_GET['pill']);
                                                    } ?>" id="pedidos" role="tabpanel" aria-labelledby="pedidos-tab">
                            <?php include("includes/pedidos.php"); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['pill']) and $_GET['pill'] == '1') {
                                                        echo 'show active'; unset($_GET['pill']);
                                                    } ?>" id="direcciones" role="tabpanel" aria-labelledby="direcciones-tab">
                            <?php include("includes/direcciones.php"); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--Modales-->
    <div class="modal fade" id="DireccionEnvio" tabindex="-1" aria-labelledby="DireccionEnvio" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="DireccionEnvio">Selecciona tu tipo de envío</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-6">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="Predeterminada" value="1">
                                <div class="card form-check-label">
                                    <div class="card-body">
                                        <h5 class="card-title">Predeterminada</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Casa</h6>
                                        <p class="card-text">Edi 10, 105-A, El Huerto, Cuautitlán</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="2">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Dirección</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Alfredo</h6>
                                        <p class="card-text">Av Del Rosal, 58, Santa Maria, Cuautitlan</p>

                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Dirección</h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Mamá</h6>
                                        <p class="card-text">Pirules 38, Paseos de Cuautitlán, Cuautitlán</p>

                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Continuar</button>
                </div>
            </div>
        </div>
    </div>




    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Selecciona tu tipo de envío</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="off">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Envío a domicilio
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="off">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Recoger en sucursal
                                </label>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#DireccionEnvio">Continuar</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="agregar_tarjeta" tabindex="-1" aria-labelledby="agregarTarjeta" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="agregar_tarjeta">Agrega tarjeta</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="container-sm">
                                <h5 class="titulo_cuenta row_espacio">Ingresa la información de la tarjeta</h5>


                                <form action="">
                                    <fieldset>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-8">
                                                    <h5 class="subtitulo_cuenta">Numero </h5>
                                                    <input type="text" class="form-control" placeholder="Ingresa los 16 dígitos de la tarjeta">
                                                </div>
                                            </div>
                                            <div class="row row_espacio">
                                                <div class="col-sm-12 col-md-8">
                                                    <h5 class="subtitulo_cuenta">Nombre</h5>
                                                    <input type="text" class="form-control" placeholder="Como aparece en la tarjeta">
                                                </div>
                                            </div>
                                            <div class="row row_espacio">
                                                <div class="col-md-4">
                                                    <h5 class="subtitulo_cuenta">Fecha de vencimiento:</h5>
                                                    <input type="text" class="form-control" placeholder="MM/AA">
                                                </div>
                                                <div class="col-md-4">
                                                    <h5 class="subtitulo_cuenta">CVV</h5>
                                                    <input type="text" class="form-control" placeholder="000">
                                                </div>

                                            </div>
                                        </div>

                                    </fieldset>
                                </form>



                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Aceptar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="NuevaDireccion" tabindex="-1" aria-labelledby="NuevaDireccion" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NuevaDireccion">Agrega nueva dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="container-sm">
                                <h5 class="titulo_cuenta row_espacio">Ingresa tu nueva dirección</h5>


                                <form action="">
                                    <fieldset>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <h5 class="subtitulo_cuenta">Alias: </h5>
                                                    <input type="text" class="form-control" placeholder="Casa">
                                                </div>
                                            </div>
                                            <div class="row row_espacio">
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Código postal:</h5>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Colonia:</h5>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Municipio:</h5>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row_espacio">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Exterior:</h5>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Interior:</h5>
                                                    <input type="text" class="form-control" placeholder="">
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Referencias:</h5>
                                                    <input type="text" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                </form>



                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Agregar dirección</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="success" tabindex="-1" aria-labelledby="success" aria-hidden="true">
        <div class="modal modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">Operación éxitosa</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">

                            <div class="d-flex col-12  text-center align-self-center"><img src="img/done.png" alt="Confirmación" style="width: 100px;">Solicitud realizada</div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Continuar</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="EditaDireccion" tabindex="-1" aria-labelledby="EditaDireccion" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditaDireccion">Editar dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container-sm">
                        <h5 class="titulo_cuenta row_espacio">Edita los campos:</h5>


                        <form action="">
                            <fieldset>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-4">
                                            <h5 class="subtitulo_cuenta">Alias: </h5>
                                            <input type="text" class="form-control" placeholder="Casa">
                                        </div>
                                    </div>
                                    <div class="row row_espacio">
                                        <div class="col-4">
                                            <h5 class="subtitulo_cuenta">Código postal:</h5>
                                            <input type="text" class="form-control" placeholder="54807">
                                        </div>
                                        <div class="col-4">
                                            <h5 class="subtitulo_cuenta">Colonia:</h5>
                                            <input type="text" class="form-control" placeholder="El Huerco">
                                        </div>
                                        <div class="col-4">
                                            <h5 class="subtitulo_cuenta">Municipio:</h5>
                                            <input type="text" class="form-control" placeholder="Cuautitlán">
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row_espacio">
                                    <div class="row">
                                        <div class="col-4">
                                            <h5 class="subtitulo_cuenta">Exterior:</h5>
                                            <input type="text" class="form-control" placeholder="Edi 10">
                                        </div>
                                        <div class="col-4">
                                            <h5 class="subtitulo_cuenta">Interior:</h5>
                                            <input type="text" class="form-control" placeholder="105-A">
                                        </div>
                                        <div class="col-4">
                                            <h5 class="subtitulo_cuenta">Referencias:</h5>
                                            <input type="text" class="form-control" placeholder="Entre Calle 1 y Calle 2">
                                        </div>
                                    </div>
                                </div>


                            </fieldset>
                        </form>



                    </div>
                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Confirmar</button>
                </div>

            </div>


        </div>

    </div>

    </div>
    </div>


    <?php include("includes/footer.php"); ?>