<?php include('includes/db.php');
$page = 2; ?>
<?php include("includes/header.php") ?>


<?php include("includes/navbar.php"); ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> d-flex alert-dismissible fade show" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div style="margin-left: 14px;"><?= $_SESSION['message']; ?></div>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php
    unset($_SESSION['message_type']);
    unset($_SESSION['message']);
}
/*foreach($_SESSION['list'] as $key=>$value)
    {
    // and print out the values
    echo 'The value of $_SESSION['."'".$key."'".'] is '."'".$value."'".' <br />';
    }*/
?>


<div class="container-sm bg-light row_espacio menu">
    <div class="row">
        <div class="col-sm-12 col-md-2 sidebar_cuenta">
            <div class="row_espacio sidebar_margen">
            <ul class="nav nav-tabs sidebar_cuenta" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link boton_color <?php if (isset($_GET['pill']) and $_GET['pill'] == '0') {
                                                                    echo 'show active';
                                                                } ?>" id="rollo-tab" data-bs-toggle="tab" data-bs-target="#rollo" type="button" role="tab" aria-controls="home" aria-selected="true">Rollos</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link boton_color <?php if (isset($_GET['pill']) and $_GET['pill'] == '1') {
                                                                    echo 'show active';
                                                                } ?>" id="bebidas-tab" data-bs-toggle="tab" data-bs-target="#bebidas" type="button" role="tab" aria-controls="bebidas" aria-selected="false">Bebidas</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link boton_color <?php if (isset($_GET['pill']) and $_GET['pill'] == '2') {
                                                                    echo 'show active';
                                                                } ?>" id="postres-tab" data-bs-toggle="tab" data-bs-target="#postres" type="button" role="tab" aria-controls="postres" aria-selected="false">Postres</button>
                        </li>     
                    </ul>
            </div>
        </div>
        <div class="col-sm-12 col-md-9 col-lg-10 contenido_cuenta">
                    <div class="tab-content">
                        <div class="tab-pane show<?php if (isset($_GET['pill']) and $_GET['pill'] == '0') {
                                                    echo 'show active';
                                                    unset($_GET['pill']);
                                                } ?>" id="rollo" role="tabpanel" aria-labelledby="rollo-tab">
                            <?php include("includes/rollos.php"); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['pill']) and $_GET['pill'] == '1') {
                                                    echo 'show active';
                                                    unset($_GET['pill']);
                                                } ?>" id="bebidas" role="tabpanel" aria-labelledby="bebidas-tab">
                            <?php include("includes/bebidas.php"); ?>
                        </div>
                        <div class="tab-pane <?php if (isset($_GET['pill']) and $_GET['pill'] == '2') {
                                                    echo 'show active';
                                                    unset($_GET['pill']);
                                                } ?>" id="postres" role="tabpanel" aria-labelledby="postres-tab">
                            <?php include("includes/postres.php"); ?>
                        </div>
                    </div>
                </div>

        
    </div>
</div>
<?php include('includes/footer.php'); ?>