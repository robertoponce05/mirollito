<?php include('includes/db.php');
$page = 2; ?>
<?php include("includes/header.php") ?>


<?php include("includes/navbar.php"); ?>
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> d-flex alert-dismissible fade show" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
        </svg>
        <div><?= $_SESSION['message']; ?></div>
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

<div class="container-sm bg-light row_espacio" style="height: 100%;">
    <div class="row">
        <div class="col-sm-12 col-md-2">
            <div class="row_espacio sidebar_margen">
            <div class="row_espacio sidebar_margen">
            <h2>Menú</h2>
            <p>Rollos</p>
            <p>Bebidas</p>
            <p>Postres</p>
            </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-8">
            <div class="row_espacio sidebar_margen">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quibusdam, doloremque officia aspernatur cupiditate tempora in fugiat. Aliquam, animi. Provident temporibus voluptatem nostrum? Ipsa reiciendis repellat voluptas culpa odio consequatur voluptate?
            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>