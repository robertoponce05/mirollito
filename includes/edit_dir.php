<div class="modal fade" id="EditaDireccion<?php echo $row['id_dir']; ?>" tabindex="-1" aria-labelledby="EditaDireccion<?php echo $row['id_dir']; ?>" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <form action="includes/update_dir.php" method="POST">
                <div class="modal-header">
                    <h5 class="modal-title" id="EditaDireccion<?php echo $row['id_dir']; ?>">Editar dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <div class="container-sm">
                        <h5 class="titulo_cuenta row_espacio">Edita los campos:</h5>



                        <fieldset>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Alias: </h5>
                                        <input type="text" class="form-control" name="alias" placeholder="Casa" value="<?php echo $row['alias']; ?>" requiered>
                                    </div>
                                </div>
                                <div class="row row_espacio">
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Código postal:</h5>
                                        <input type="text" class="form-control" name="cp" placeholder="" value="<?php echo $row['cp']; ?>">
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Colonia:</h5>
                                        <input type="text" class="form-control" name="colonia" placeholder="" value="<?php echo $row['colonia']; ?>" requiered>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Municipio:</h5>
                                        <input type="text" class="form-control" name="municipio" placeholder="" value="<?php echo $row['municipio']; ?>" requiered>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row_espacio">
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Calle:</h5>
                                        <input type="text" class="form-control" name="calle" value="<?php echo $row['calle']; ?>" requiered>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Exterior:</h5>
                                        <input type="text" class="form-control" name="exterior" placeholder="" value="<?php echo $row['exterior']; ?>" requiered>
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Interior:</h5>
                                        <input type="text" class="form-control" name="interior" placeholder="" value="<?php echo $row['interior']; ?>">
                                    </div>
                                    <div class="col-12">
                                        <h5 class="subtitulo_cuenta">Referencias:</h5>
                                        <input type="text" class="form-control" name="referencias" placeholder="" value="<?php echo $row['referencia']; ?>" requiered>
                                    </div>
                                </div>
                            </div>


                        </fieldset>




                    </div>
                </div>
                <div class="modal-footer">
                    <input name="idDir" type="hidden" value="<?php echo $row['id_dir']; ?>">
                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Confirmar</button>
                </div>
            </form>
        </div>


    </div>

</div>