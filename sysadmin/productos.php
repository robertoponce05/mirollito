<?php
include("includes/db.php");
$in = 1;
include("includes/header.php");  ?>

<div class="col-8 col-md-10 lateral bg_contenido position-relative overflow-auto">
<?php if (isset($_SESSION['message'])) { ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
        <?= $_SESSION['message']; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

<?php unset($_SESSION['message']);
    unset($_SESSION['message_type']);
} ?>
    <div class="container-fluid contenido">
        <div class="container salto">
            <h4 class="position-relative">Selecciona el producto a editar o agrega uno nuevo
                <a class="btn d-inline-flex position-absolute start-100 translate-middle-x" data-bs-toggle="modal" data-bs-target="#agregarItem">
                    <h5 class="align-middle" style="padding: 2px; color: #681212">Agregar </h5><img src="img/add.png" alt="Agregar" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 30px;">
                </a>
            </h4>

        </div>
        <div class="row scroll_column salto">
            <h3>Habilitados</h3>
            <?php
            $query = "SELECT * FROM productos";
            $result_clientes = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result_clientes)) {
                if ($row['habilitar'] == 0) {
            ?>

                    <div class="card" style="width: 15rem; margin: 5px; max-height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['titulo'] ?></h5>
                            <img class="img-fluid img_item" src="../img/menu_img/<?php echo $row['id_item'] ?>.jpg" alt="item">
                            <p class="card-text"><?php echo $row['detalle'] ?></p><?php $id_item = $row['id_item']; ?>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalProduct<?php echo $row['id_item'] ?>">
                                Ver más
                            </button>
                        </div>
                    </div>

                    <div class="modal fade" id="modalProduct<?php echo $id_item ?>" tabindex="-1" aria-labelledby="<?php echo $id_item ?>" aria-hidden="true">
                        <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <form action="includes/editar_producto.php" method="POST">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modalProduct<?php echo $id_item ?>">Edición de<?php echo ' "' . $row['titulo']; ?>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 form-group"><img class="img-fluid" src="../img/menu_img/<?php echo $row['id_item'] ?>.jpg" alt="item"> <input type="file"> </div>
                                                <div class="col col-lg-6">
                                                    <div class="row row_espacio">

                                                        <div class="col-6 col-md-8">
                                                            <h4>Nombre</h4>
                                                        </div>
                                                        <div class="col-6 col-md-4 text-center"> <input type="text" value="<?php echo $row['titulo'] ?>" name="titulo"> </div>
                                                    </div>
                                                    <div class="row row_espacio">

                                                        <div class="col-6 col-md-8">
                                                            <h4>Costo</h4>
                                                        </div>
                                                        <div class="col-6 col-md-4 text-center"> <input type="text" value="<?php echo $row['precio'] ?>" size="6" name="precio"> </div>
                                                    </div>
                                                    <div class="row row_espacio">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4>Detalle</h4>
                                                            <p><textarea name="descripcion" id="" cols="40" rows="3"><?php echo $row['detalle'] ?></textarea> </p>
                                                            <input type="hidden" name="id" value="<?php echo $row['id_item']; ?>">
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-lg-8">
                                                            <h5>Stock</h5>
                                                        </div>
                                                        <div class="col-5 col-sm-3 col-lg-3">
                                                            <input class="form-control " type="number" name="stock" min="0" value="<?php echo $row['stock'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <br>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="habilitar">
                                                                <label class="form-check-label" for="flexSwitchCheckChecked">Mostrar en el listado</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6"><br>
                                                            <label for="exampleDataList" class="form-label">Categoría</label>
                                                            <select name="categoria" class="form-control" required>

                                                                <option <?php if ($row['categoria'] == 'Sushi') {
                                                                            echo 'selected';
                                                                        } ?> value="Sushi">Sushi</option>
                                                                <option <?php if ($row['categoria'] == 'Bebidas') {
                                                                            echo 'selected';
                                                                        } ?> value="Bebidas">Bebidas</option>
                                                                <option <?php if ($row['categoria'] == 'Postres') {
                                                                            echo 'selected';
                                                                        } ?> value="Postres">Postres</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="hidden" name="id" value="<?php echo $row['id_item']; ?>">
                                        <input type="submit" class="btn btn-success" value="Aceptar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

            <?php }
            }
            ?>
            <h3>Deshabilitados</h3>
            <!--Listar productos deshabilitados-->
            <?php
            $query = "SELECT * FROM productos";
            $result_clientes = mysqli_query($conn, $query);
            while ($row = mysqli_fetch_array($result_clientes)) {
                if ($row['habilitar'] == 1) {
            ?>

                    <div class="card" style="width: 15rem; margin: 5px; max-height: 20rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['titulo'] ?></h5>
                            <img class="img-fluid img_item" src="../img/menu_img/<?php echo $row['id_item'] ?>.jpg" alt="item">
                            <p class="card-text"><?php echo $row['detalle'] ?></p><?php $id_item = $row['id_item']; ?>
                            <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modalProduct<?php echo $row['id_item'] ?>">
                                Ver más
                            </button>
                        </div>
                    </div>

                    <div class="modal fade" id="modalProduct<?php echo $id_item ?>" tabindex="-1" aria-labelledby="<?php echo $id_item ?>" aria-hidden="true">
                        <div class="modal-xl modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <form action="includes/editar_producto.php" method="POST">
                                    <div class="modal-header">

                                        <h5 class="modal-title" id="modalProduct<?php echo $id_item ?>">Edición de<?php echo ' "' . $row['titulo']; ?>"</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12 col-lg-6 form-group"><img class="img-fluid" ssrc="../img/menu_img/<?php echo $row['id_item'] ?>.jpg" alt="item"> <input type="file"> </div>
                                                <div class="col col-lg-6">
                                                    <div class="row row_espacio">

                                                        <div class="col-6 col-md-8">
                                                            <h4>Nombre</h4>
                                                        </div>
                                                        <div class="col-6 col-md-4 text-center"> <input type="text" value="<?php echo $row['titulo'] ?>" name="titulo"> </div>
                                                    </div>
                                                    <div class="row row_espacio">

                                                        <div class="col-6 col-md-8">
                                                            <h4>Costo</h4>
                                                        </div>
                                                        <div class="col-6 col-md-4 text-center"> <input type="text" value="<?php echo $row['precio'] ?>" size="6" name="precio"> </div>
                                                    </div>
                                                    <div class="row row_espacio">

                                                    </div>
                                                    <div class="row">
                                                        <div class="col">
                                                            <h4>Detalle</h4>
                                                            <p><textarea name="descripcion" id="" cols="40" rows="3"><?php echo $row['detalle'] ?></textarea> </p>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col col-lg-8">
                                                            <h5>Stock</h5>
                                                        </div>
                                                        <div class="col-5 col-sm-3 col-lg-3">
                                                            <input class="form-control " type="number" name="stock" min="0" value="<?php echo $row['stock'] ?>" required>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <br>
                                                            <div class="form-check form-switch">
                                                                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="habilitar">
                                                                <label class="form-check-label" for="flexSwitchCheckChecked">Mostrar en el listado</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-6"><br>
                                                            <label for="exampleDataList" class="form-label">Categoría</label>
                                                            <select name="categoria" class="form-control" required>

                                                                <option <?php if ($row['categoria'] == 'Sushi') {
                                                                            echo 'selected';
                                                                        } ?> value="Sushi">Sushi</option>
                                                                <option <?php if ($row['categoria'] == 'Bebidas') {
                                                                            echo 'selected';
                                                                        } ?> value="Bebidas">Bebidas</option>
                                                                <option <?php if ($row['categoria'] == 'Postres') {
                                                                            echo 'selected';
                                                                        } ?> value="Postres">Postres</option>

                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Cerrar</button>
                                        <input type="hidden" name="id" value="<?php echo $row['id_item']; ?>">
                                        <input type="submit" class="btn btn-success" value="Aceptar">

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
    <div class="toast align-items-center" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="d-flex">
            <div class="toast-body">
                Hello, world! This is a toast message.
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>