<?php include('includes/db.php');
$page = 5; ?>
<?php include("includes/header.php") ?>
<?php
$ini = 2;
?>
<?php include("includes/navbar.php") ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php session_unset();
} ?>
<div class="container row_espacio" style="height: 90%;">

    <div class="card">
        <h5 class="card-header">Regístrate</h5>
        <div class="card-body">
            <form action="includes/registrar.php" method="POST">

                <div class="row">
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Nombre(s):</h5>
                        <input type="text" name="nombre" class="form-control" placeholder="" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Primer apellido</h5>
                        <input type="text" name="pape" class="form-control" required>
                    </div>
                    <div class="mb-3 col-md-4">
                        <h5 class="subtitulo_cuenta">Segundo apellido</h5>
                        <input type="text" name="sape" class="form-control" placeholder="Opcional">
                    </div>
                </div>
                <div class="row">
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Correo electrónico:</h5>

                        <input type="email" name="mail" class="form-control" placeholder="name@dominio.example" required>
                    </div>
                    <div class="mb-3 col-md-6">

                        <h5 class="subtitulo_cuenta">Número celular:</h5>
                        <input type="text" name="numero" class="form-control" placeholder="15 12345678" required maxlength="10" pattern="[1-9]{1}[0-9]{9}">

                    </div>
                </div>
                <div class="row  row_espacio">
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Contraseña:</h5>
                        <input type="password" name="pass" class="form-control" placeholder="8 a 16 caracteres" required minlength="8" maxlength="16" pattern=".{8,}">
                    </div>
                    <div class="mb-3 col-md-6">
                        <h5 class="subtitulo_cuenta">Confirmar contraseña:</h5>
                        <input type="password" name="repass" class="form-control" placeholder="Reingresa tu contraseña" required minlength="8" maxlength="16" pattern=".{8,}">
                    </div>
                </div>
                <input type="submit" class="btn enviar_sesion btn-outline-success" name="registra" value="Registrarse">

            </form>
        </div>
    </div>


</div>
<?php include("includes/footer.php") ?>