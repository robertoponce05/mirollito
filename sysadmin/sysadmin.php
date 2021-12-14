<?php include("includes/db.php");$in=0; include("includes/header.php");  ?>
<div class="col-8 col-md-10 lateral bg_contenido position-relative overflow-auto">
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php unset($_SESSION['message']);
    unset($_SESSION['message_type']);
} ?>
            <div class="col-8 col-md-10 fullHeight bg_contenido position-relative">

                <h3 class="position-absolute top-50 start-50 translate-middle">Bienvenido al sysadmin de Rollito</h3>
            </div>
        </div>
    </div>

    </div>
<?php include('includes/footer.php')?>