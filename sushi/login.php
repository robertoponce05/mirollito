<?php include('includes/db.php') ?>
<?php include("includes/header.php") ?>
<?php
$ini = 0;
?>
<?php include("includes/navbar.php") ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php session_unset();
} ?>

<div class="container-sm iniciar_sesion">
    <form class="card" action="includes/user.php" method="POST">
        <div class="card-header">
            Iniciar sesión
        </div>
        <div class="card-body">
            <h5 class="card-title">Correo electrónico o número</h5>
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="usuario" placeholder="name@example.com">
                <label for="floatingInput">Correo o número</label>
            </div>
            <h5 class="card-title">Contraseña</h5>
            <div class="form-floating">
                <input type="password" class="form-control" name="password" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>
            <div class="row">
                <div class="col-6"><input type="submit" class="btn enviar_sesion btn-outline-dark" name="user" value="Iniciar sesión"></div>
                <div class="col-6"><a href="signup.php" class="btn enviar_sesion btn-link" role="button">Regístrate</a></div>
            </div>
        </div>
    </form>
</div>
<?php include("includes/footer.php") ?>