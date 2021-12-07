<div class="container-sm">
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
    ?>
    <div class="row">
        <div class="col-6">
            <h3 class="titulo_cuenta">Formas de pago</h3>
        </div>

        <div class="col-6">
            <a class="btn text-end" data-bs-toggle="modal" data-bs-target="#agregar_tarjeta">
                <h5 style="padding: 2px; color: #681212">Agregar nueva<img src="/sysadmin/img/add.png" alt="Agregar" style="width: 30px; height: 30px;"></h5>
            </a>
        </div>
    </div>
    <div class="container-sm row_espacio">
        <div class="row">
            <?php
            $id = $_SESSION['idusuario'];
            $query = "SELECT * FROM tarjetas WHERE id_client= '$id' and principal='1'";
            $result_cards = mysqli_query($conn, $query);
            $preferido = 0;
            while ($row = mysqli_fetch_array($result_cards)) {
                if (($row['estado'] == '1') and ($row['principal'] == '1')) {
                    $sinpreferido = 1;
                    if ($preferido == 0) { ?>

                        <div class="col-12">
                            <h4 class="row_espacio">Preferida</h4>
                        </div>

                    <?php $preferido = 1;
                    }
                    ?>
                    <div class="col-6">
                        <div class="card">
                            <?php
                            $ccard = $row['ccard'];
                            $ccardi = substr($ccard, 0, 4) . '********';
                            $ccardi = $ccardi . substr($ccard, 12, 15);
                            ?>
                            <div class="card-body">
                                <div class="d-flex">
                                    <h5 class="card-title"><?php echo $ccardi; ?></h5>
                                    <a href="/includes/delete_card.php?i=<?php echo $row['id_card']; ?>"><img class="d-flex justify-content-end" src="/img/delete.png" alt="Eliminar tarjeta" width="30px"></a>
                                </div>
                                <div class="card-text">
                                    <div class="col">
                                        <p>Vencimiento: <?php echo $row['vencimiento'] ?></p>

                                        <p><?php echo $row['nombre'] ?></p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modificar_tarjeta<?php echo $row['id_card']; ?>">Editar</a>
                            </div>
                        </div>
                    </div>

                    <!--Modal modifical tarjeta favorita-->
                    <div class="modal fade" id="modificar_tarjeta<?php echo $row['id_card']; ?>" tabindex="-1" aria-labelledby="modificarTarjeta<?php echo $row['id_card']; ?>" aria-hidden="true">
                        <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificar_tarjeta<?php echo $row['id_card']; ?>">Editando tarjeta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="includes/card_update.php" method="POST">
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="container-sm">
                                                    <h5 class="titulo_cuenta row_espacio">Edita tu tarjeta y presionar Guardar</h5>



                                                    <fieldset>
                                                        <div class="mb-3">
                                                            <div class="row row_espacio">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <h5 class="subtitulo_cuenta">Alias</h5>
                                                                    <input type="text" class="form-control" placeholder="Agrega un alias" name="alias" value="<?php echo $row['alias']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row row_espacio">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <h5 class="subtitulo_cuenta">Numero</h5>
                                                                    <input type="text" class="form-control" minlength="16" maxlength="16" pattern="[0-9]{16}" placeholder="<?php echo $ccardi; ?>" name="card">
                                                                </div>
                                                            </div>
                                                            <div class="row row_espacio">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <h5 class="subtitulo_cuenta">Nombre</h5>
                                                                    <input type="text" class="form-control" placeholder="Como aparece en la tarjeta" name="nombre" minlength="6" value="<?php echo $row['nombre']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row row_espacio">
                                                                <div class="col-md-4">
                                                                    <h5 class="subtitulo_cuenta">Fecha de vencimiento:</h5>
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control"  data-date-format="YY MM" placeholder="MM/AA" name="vencimiento" value="<?php echo /*$fecha = substr($row['vencimiento'], 5, 2).'/'.*/substr($row['vencimiento'], 0, 7); ?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                                    </div>
                                                                    <!-- <input type="month" title="Utiliza una fecha mayor o igual al mes y año actual. Utiliza '/' para separar mes y año" class="form-control" placeholder="MM/AA" name="vencimiento" value="<?php echo $fecha = substr($row['vencimiento'], 0, 7); ?>" required> -->
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h5 class="subtitulo_cuenta">CVV</h5>
                                                                    <input type="hidden" value="<?php echo $row['id_card']; ?>" name="tarjeta">
                                                                    <input type="password" class="form-control" placeholder="XXX" name="cvv" pattern="[0-9]{3}" value="<?php echo $row['cvv']; ?>" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked name="predeterminada">
                                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Predeterminada</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </fieldset>




                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <!--button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Aceptar</button-->
                                        <input type="submit" class="btn btn-success" value="Guardar" name="aceptar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>

        </div>
        <div class="row">
            <?php
            $que = "SELECT * FROM tarjetas WHERE id_client= '$id'";
            $result = mysqli_query($conn, $que);
            $it = 0;
            while ($row2 = mysqli_fetch_array($result)) {
                if (($row2['estado'] == 1) and ($row2['principal'] == 0)) {

                    if (($it == 0)) {
            ?>
                        <div class="col-12">
                            <h4 class="row_espacio">Otras tarjetas</h4>
                        </div>
                    <?php $it = 1;
                    } ?>
                    <div class="col-6 row_espacio">
                        <div class="card">
                            <?php
                            $ccard = $row2['ccard'];
                            $ccardi = substr($ccard, 0, 4) . '********';
                            $ccardi = $ccardi . substr($ccard, 12, 15);
                            ?>
                            <div class="card-body">
                                <div class="d-flex">
                                    <h5 class="card-title"><?php echo $ccardi; ?></h5>
                                    <a href="/includes/delete_card.php?i=<?php echo $row2['id_card']; ?>"><img class="d-flex justify-content-end" src="/img/delete.png" alt="Eliminar tarjeta" width="30px"></a>
                                </div>
                                <div class="card-text">
                                    <div class="col">
                                        <p>Vencimiento: <?php echo $row2['vencimiento'] ?></p>

                                        <p><?php echo $row2['nombre'] ?></p>
                                    </div>
                                </div>
                                <a href="#" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modificar_tarjeta<?php echo $row2['id_card']; ?>">Editar</a>
                            </div>
                        </div>
                    </div>
                    <!--Modal modifical tarjeta-->
                    <div class="modal fade" id="modificar_tarjeta<?php echo $row2['id_card']; ?>" tabindex="-1" aria-labelledby="modificarTarjeta<?php echo $row2['id_card']; ?>" aria-hidden="true">
                        <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modificar_tarjeta<?php echo $row2['id_card']; ?>">Editando tarjeta</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="includes/card_update.php" method="POST">
                                    <div class="modal-body">
                                        <div class="container">
                                            <div class="row">
                                                <div class="container-sm">
                                                    <h5 class="titulo_cuenta row_espacio">Modifica la información y presionar Guardar</h5>



                                                    <fieldset>
                                                        <div class="mb-3">
                                                            <div class="row row_espacio">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <h5 class="subtitulo_cuenta">Alias</h5>
                                                                    <input type="text" class="form-control" placeholder="Agrega un alias" name="alias" value="<?php echo $row2['alias']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row row_espacio">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <h5 class="subtitulo_cuenta">Numero</h5>
                                                                    <input type="text" class="form-control" minlength="16" maxlength="16" pattern="[0-9]{16}" placeholder="<?php echo $ccardi; ?>" name="card">
                                                                </div>
                                                            </div>
                                                            <div class="row row_espacio">
                                                                <div class="col-sm-12 col-md-8">
                                                                    <h5 class="subtitulo_cuenta">Nombre</h5>
                                                                    <input type="text" class="form-control" placeholder="Como aparece en la tarjeta" name="nombre" minlength="6" value="<?php echo $row2['nombre']; ?>" required>
                                                                </div>
                                                            </div>
                                                            <div class="row row_espacio">
                                                                <div class="col-md-4">
                                                                    <h5 class="subtitulo_cuenta">Fecha de vencimiento:</h5>
                                                                    <div class="input-group date">
                                                                        <input type="text" class="form-control"  data-date-format="YY MM" placeholder="MM/AA" name="vencimiento" value="<?php /*echo $fecha = substr($row2['vencimiento'], 5, 2).'/'.substr($row2['vencimiento'], 2, 2);*/ echo substr($row2['vencimiento'],0,7);?>" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                                    </div>
                                                                    <!-- <input type="month" title="Utiliza una fecha mayor o igual al mes y año actual. Utiliza '/' para separar mes y año" class="form-control" placeholder="MM/AA" name="vencimiento" value="<?php /*echo $fecha = substr($row2['vencimiento'], 0, 7);*/ ?>" required> -->
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <h5 class="subtitulo_cuenta">CVV</h5>
                                                                    <input type="hidden" value="<?php echo $row2['id_card']; ?>" name="tarjeta">
                                                                    <input type="password" class="form-control" placeholder="XXX" name="cvv" pattern="[0-9]{3}" value="<?php echo $row2['cvv']; ?>" required>
                                                                </div>
                                                                <div class="col-6">
                                                                    <div class="form-check form-switch">
                                                                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" name="predeterminada">
                                                                        <label class="form-check-label" for="flexSwitchCheckChecked">Predeterminada</label>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </fieldset>




                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <!--button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Aceptar</button-->
                                        <input type="submit" class="btn btn-success" value="Guardar" name="aceptar">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>



                <?php }
                ?>

            <?php
            }
            if ($it == 0 and $preferido == 0) {
            ?><div class="row_espacio">
                    <h5>No tienes tarjetas agregadas</h5>
                </div>
            <?php
            } ?>
        </div>


    </div>
</div>

<!--Modal agregar tarjeta-->
<div class="modal fade" id="agregar_tarjeta" tabindex="-1" aria-labelledby="agregarTarjeta" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregar_tarjeta">Agrega tarjeta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="includes/add_card.php" method="POST">
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="container-sm">
                                <h5 class="titulo_cuenta row_espacio">Ingresa la información de la tarjeta</h5>



                                <fieldset>
                                    <div class="mb-3">
                                        <div class="row row_espacio">
                                            <div class="col-sm-12 col-md-8">
                                                <h5 class="subtitulo_cuenta">Alias</h5>
                                                <input type="text" class="form-control" placeholder="Agrega un alias" name="alias" required>
                                            </div>
                                        </div>
                                        <div class="row row_espacio">
                                            <div class="col-sm-12 col-md-8">
                                                <h5 class="subtitulo_cuenta">Numero</h5>
                                                <input type="text" class="form-control" minlength="16" maxlength="16" pattern="[0-9]{16}" placeholder="Ingresa los 16 dígitos de la tarjeta" name="card" required>
                                            </div>
                                        </div>
                                        <div class="row row_espacio">
                                            <div class="col-sm-12 col-md-8">
                                                <h5 class="subtitulo_cuenta">Nombre</h5>
                                                <input type="text" class="form-control" placeholder="Como aparece en la tarjeta" name="nombre" minlength="6" required>
                                            </div>
                                        </div>
                                        <div class="row row_espacio">
                                            <div class="col-md-4">
                                                <h5 class="subtitulo_cuenta">Fecha de vencimiento:</h5>
                                                <div class="input-group date">
                                                    <input type="text" class="form-control" readonly="" data-date-format="YYYY MM" placeholder="MM/AA" name="vencimiento" required><span class="input-group-addon"><i class="glyphicon glyphicon-th"></i></span>
                                                </div>
                                                <!-- <input type="text" data-date="" data-date-format="MM YY" class="form-control" placeholder="MM/AA" name="vencimiento" required> -->
                                            </div>
                                            <div class="col-md-4">
                                                <h5 class="subtitulo_cuenta">CVV</h5>
                                                <input type="text" class="form-control" placeholder="XXX" name="cvv" pattern="[0-9]{3}" required>
                                            </div>

                                        </div>
                                    </div>

                                </fieldset>




                            </div>


                        </div>
                    </div>
                </div>
                <div class="modal-footer">

                    <!--button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Aceptar</button-->
                    <input type="submit" class="btn btn-success" value="Aceptar" name="aceptar">
                </div>
            </form>
        </div>
    </div>
</div>