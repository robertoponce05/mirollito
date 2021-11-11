<?php include('includes/db.php') ?>
<?php include("includes/header.php") ?>
<?php
$ini = 0;
$page = 4;
?>
<?php include("includes/navbar.php") ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php unset($_SESSION['message']); unset($_SESSION['message_type']);
} ?>

<div class="container-sm iniciar_sesion">

<form class="card">
        <div class="card-header text-center">
            <h4>Recuperación de contraseña</h3>
        </div>
        <div class="card-body">
        <p>Te envíaremos las instrucciones para recuperar tu contraseña a tu correo electrónico.</p>
            <h5 class="card-title">Correo electrónico o número</h5>
            
            <div class="form-floating mb-3">
                <input type="text" class="form-control" name="usuario" placeholder="name@example.com">
                <label for="floatingInput">Correo o número</label>
            </div>
            
            <div class="row">
                <div class="col-6"><input type="submit" class="btn enviar_sesion btn-outline-dark" name="user" value="Continuar"></div>
                
            </div>
            
        </div>
    </form>
        




    </div>


</div>