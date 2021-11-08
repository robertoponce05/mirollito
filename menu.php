<?php include('includes/db.php');
$page = 2; ?>
<?php include("includes/header.php") ?>
<?php
$ini = 3;

?>
<?php include("includes/navbar.php") ?>

<div class="container-sm bg-light" style="height: 100%;">
    <div class="row">
        <div class="col-2">
            <h2>Menú</h2>
            <p>Rollos</p>
            <p>Bebidas</p>
            <p>Postres</p>







        </div>
        <div class="col-10">
            <?php
            echo ''
            ?>
            <div class="row">
                <?php
                $query = "SELECT * FROM productos";
                $result_clientes = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_array($result_clientes)) {
                    if ($row['habilitar'] == 0) { ?>

                        <div class="card" style="width: 14rem; margin: 5px;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['titulo'] ?></h5>
                                <img class="img-fluid img_item" src="img/item.jpg" alt="item">
                                <p class="card-text"><?php echo $row['detalle'] ?></p><?php $id_item = $row['id_item']; ?>
                                <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#modalProduct<?php echo $id_item ?>">
                                    Ver más
                                </button>
                            </div>
                        </div>
                        
                        <div class="modal fade" id="modalProduct<?php echo $id_item?>" tabindex="-1" aria-labelledby="<?php echo $id_item?>" aria-hidden="true">
                            <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modalProduct<?php echo $id_item?>"><?php echo $row['titulo'] ?></h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 form-group"><img class="img-fluid" src="img/item.jpg" alt="item"></div>
                                                <div class="col col-lg-6">
                                                    <div class="row row_espacio">

                                                        <div class="col-6 col-md-8">
                                                            <h4>Costo</h4>
                                                        </div>
                                                        <div class="col-6 col-md-4 text-center">$<?php echo $row['precio'] ?></div>
                                                    </div>
                                                    <div class="row row_espacio">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4>Detalle</h4>
                                                            <p><?php echo $row['detalle'] ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-lg-8">
                                                            <h5>Cantidad</h5>
                                                        </div>
                                                        <div class="col-5 col-sm-3 col-lg-3">
                                                            <input class="form-control " type="number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <button type="button" class="btn btn-primary">Agregar al carrito</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                <?php }
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php include('includes/footer.php'); ?>