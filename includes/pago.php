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
    <h3 class="titulo_cuenta row_espacio">Formas de pago</h3>

    <div class="container-sm row_espacio">
        <div class="row position-relative">
            <div class="col-6 position-absolute start-0">
                <h4 class="row_espacio">Preferida</h4>
            </div>
            <div class="col-6 position-absolute  end-0">
                <a class="btn row_espacio text-end" data-bs-toggle="modal" data-bs-target="#agregar_tarjeta">
                    <h5 style="padding: 2px; color: #681212">Agregar <img src="/sysadmin/img/add.png" alt="Agregar" style="width: 30px; height: 30px;"></h5>
                </a>
            </div>
        </div>
        <?php
        $query = "SELECT id_card,ccard,nombre,estado,vencimiento FROM tarjetas";
        $result_cards = mysqli_query($conn, $query);
        $row2 = mysqli_fetch_array($result_cards);
        while ($row = mysqli_fetch_array($result_cards)) {
            if ($row['status'] == 1) { ?>

                <div class="card w-50">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['alias'] ?></h5>
                        <div class="card-text">
                            <div class="col">
                                <p>Vencimiento: <?php echo $row['vencimiento'] ?></p>

                                <p><?php echo $row['nombre'] ?></p>
                            </div>
                        </div>
                        <a href="#" class="btn btn-primary">Editar</a>
                    </div>
                </div>
        <?php }
        }
        ?>
        <?php 
        $filas=mysqli_num_rows($result_cards);
        if ($filas<0) { ?>
                <div class="row_espacio">
                    <h5><?php echo 'Sin tarjetas que mostrar'; ?></h5>
                </div>
        <?php }?>



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
                                                <input type="text" class="form-control" placeholder="Ingresa los 16 dígitos de la tarjeta" name="card" required>
                                            </div>
                                        </div>
                                        <div class="row row_espacio">
                                            <div class="col-sm-12 col-md-8">
                                                <h5 class="subtitulo_cuenta">Nombre</h5>
                                                <input type="text" class="form-control" placeholder="Como aparece en la tarjeta" name="nombre" required>
                                            </div>
                                        </div>
                                        <div class="row row_espacio">
                                            <div class="col-md-4">
                                                <h5 class="subtitulo_cuenta">Fecha de vencimiento:</h5>
                                                <input type="text" maxlength="5" pattern="(0|1)[0-9]\/2[0-9]" title="Utiliza una fecha mayor o igual al mes y año actual. Utiliza '/' para separar mes y año" class="form-control" placeholder="MM/AA" name="vencimiento" required>
                                            </div>
                                            <div class="col-md-4">
                                                <h5 class="subtitulo_cuenta">CVV</h5>
                                                <input type="text" class="form-control" placeholder="XXX" name="cvv" required>
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