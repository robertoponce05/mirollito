<div class="menu_padre">
            <div class=" menu_hijo">
                <div class="row ">

                    <?php if (isset($_SESSION['messag'])) { ?>
                        <div class="alert alert-<?= $_SESSION['message_typ'] ?> d-flex alert-dismissible fade show" role="alert">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            <div style="margin-left: 14px;"><?= $_SESSION['messag']; ?></div>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['message_typ']);
                        unset($_SESSION['messag']);
                    }

                    ?>
                    <?php
                    $query = "SELECT * FROM productos";
                    $result_clientes = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_clientes)) {
                        if ($row['habilitar'] == 0 and $row['categoria']=='Bebidas' ) { 
                            
                            ?>

                            <div class="card" style="width: 14rem; margin: 5px;">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo $row['titulo'] ?></h5>
                                    <img class="img-fluid img_item" src="img/menu_img/<?php echo $row['id_item'] ?>.jpg" alt="item">
                                    <p class="card-text"><?php echo $row['detalle'] ?></p><?php $id_item = $row['id_item']; ?>
                                    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalProduct<?php echo $row['id_item'] ?>">
                                        Ver más
                                    </button>
                                </div>
                            </div>

                            <div class="modal fade" id="modalProduct<?php echo $id_item ?>" tabindex="-1" aria-labelledby="<?php echo $id_item ?>" aria-hidden="true">
                                <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <form action="includes/listar.php" method="POST">
                                            <div class="modal-header">

                                                <h5 class="modal-title" id="modalProduct<?php echo $id_item ?>"><?php echo $row['titulo'] ?></h5>
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
                                                                    <input type="hidden" name="id" value="<?php echo $row['id_item']; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col col-lg-8">
                                                                    <h5>Cantidad</h5>
                                                                </div>
                                                                <div class="col-5 col-sm-3 col-lg-3">
                                                                    <input class="form-control " type="number" name="cantidad" min="1" max="10" value="0" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                <input type="hidden" name="id" value="<?php echo $row['id_item']; ?>">
                                                <input type="submit" class="btn btn-success" value="Agregar a carrito">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                    <?php }
                    }
                    ?>

                </div>
            </div>
        </div>