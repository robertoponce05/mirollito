<?php error_reporting(0);
include("includes/db.php");
$in = 3;
include("includes/header.php");  ?>
<div class="col-8 col-md-10 fullHeight bg_contenido position-relative">
    <div class="container">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellidos</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Celular</th>
                        <th scope="col">Acción</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $query = "SELECT * FROM clientes";
                    $result_clientes = mysqli_query($conn, $query);
                    while ($row = mysqli_fetch_array($result_clientes)) { ?>
                        <tr>
                            <th><?php echo $row['idusuario'] ?></t>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['p_apellido'] ?>
                            <?php echo $row['s_apellido'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td>
                                <a href="includes/consultar.php?<?php $row['idusuario']?>" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info_usuario" name="id>Ver más</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
</div>
</div>


</div>
<!-- Vertically centered modal -->
<div class="modal fade" id="info_usuario" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Información de usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellidos</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Celular</th>
                                    <th scope="col">Acción</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>


                                    <th scope="row">1</th>
                                    <td>Roberto</td>
                                    <td>Ponce Cano</td>
                                    <td>rcponce@outlook.com</td>
                                    <td>+52 5530825580</td>
                                    <td>
                                        <button type="button" class="btn btn-danger">Cambiar Contraseña</button>
                                        <button type="button" class="btn btn-success">Habilitar edición</button>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">

                    <div class="container-sm">
                        <div class="row">
                            <div class="col-9">
                                <h3 class="titulo_cuenta row_espacio">Direcciones</h3>
                            </div>
                            <div class="col-3 row_espacio d-flex"><a type="button" data-bs-toggle="modal" data-bs-target="#NuevaDireccion"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <line x1="12" y1="5" x2="12" y2="19" />
                                        <line x1="5" y1="12" x2="19" y2="12" />
                                    </svg></a>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Predeterminada</h5>
                                    <h6 class="card-subtitle mb-2 text-muted">Casa</h6>
                                    <p class="card-text">Edi 10 - 105-A, El Huerco, Cuautitlán</p>
                                    <a class="card-link" data-bs-toggle="modal" data-bs-target="#EditaDireccion">Editar</a>

                                </div>
                            </div>
                        </div>
                        <div class="row row_espacio">
                            <h5>Otras direcciones</h5>
                            <div class="card col-md-6">
                                <div class="card-body card_direccion">

                                    <h6 class="card-subtitle mb-2 text-muted">Alfredo</h6>
                                    <p class="card-text">Edi 10 - 105-A, El Huerco, Cuautitlán</p>
                                    <a class="card-link" data-bs-toggle="modal" data-bs-target="#EditaDireccion">Editar</a>

                                </div>
                            </div>

                            <div class="card col-md-6">
                                <div class="card-body card_direccion">

                                    <h6 class="card-subtitle mb-2 text-muted">Mamá</h6>
                                    <p class="card-text">Edi 10 - 105-A, El Huerco, Cuautitlán</p>
                                    <a class="card-link" data-bs-toggle="modal" data-bs-target="#EditaDireccion">Editar</a>

                                </div>
                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <!--button type="button" class="btn btn-primary">Editar</button-->
            </div>
        </div>
    </div>
</div>

<!--Nueva Dirección-->
<div class="modal fade" id="NuevaDireccion" tabindex="-1" aria-labelledby="NuevaDireccion" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NuevaDireccion">Agrega nueva dirección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="container-sm">
                            <h5 class="titulo_cuenta row_espacio">Ingresa tu nueva dirección</h5>


                            <form action="">
                                <fieldset>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <h5 class="subtitulo_cuenta">Alias: </h5>
                                                <input type="text" name="alias" class="form-control" placeholder="Casa">
                                            </div>
                                        </div>
                                        <div class="row row_espacio">
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Código postal:</h5>
                                                <input type="text" name="cp" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Colonia:</h5>
                                                <input type="text" name="colonia" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Municipio:</h5>
                                                <input type="text" name="municipio" class="form-control" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row_espacio">
                                        <div class="row">
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Exterior:</h5>
                                                <input type="text" name="exterior" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Interior:</h5>
                                                <input type="text" name="interior" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Referencias:</h5>
                                                <input type="text" name="refe" class="form-control">
                                            </div>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>



                        </div>


                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" name="AgregarDireccion" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Agregar dirección</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="success" tabindex="-1" aria-labelledby="success" aria-hidden="true">
    <div class="modal modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Operación éxitosa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">

                        <div class="d-flex col-12  text-center align-self-center"><img src="img/done.png" alt="Confirmación" style="width: 100px;">Solicitud realizada</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Continuar</button>
            </div>
        </div>
    </div>
</div>



<div class="modal fade" id="EditaDireccion" tabindex="-1" aria-labelledby="EditaDireccion" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="EditaDireccion">Editar dirección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="container-sm">
                    <h5 class="titulo_cuenta row_espacio">Edita los campos:</h5>


                    <form action="">
                        <fieldset>
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Alias: </h5>
                                        <input type="text" class="form-control" placeholder="Casa">
                                    </div>
                                </div>
                                <div class="row row_espacio">
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Código postal:</h5>
                                        <input type="text" class="form-control" placeholder="54807">
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Colonia:</h5>
                                        <input type="text" class="form-control" placeholder="El Huerco">
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Municipio:</h5>
                                        <input type="text" class="form-control" placeholder="Cuautitlán">
                                    </div>
                                </div>
                            </div>
                            <div class="mb-3 row_espacio">
                                <div class="row">
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Exterior:</h5>
                                        <input type="text" class="form-control" placeholder="Edi 10">
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Interior:</h5>
                                        <input type="text" class="form-control" placeholder="105-A">
                                    </div>
                                    <div class="col-4">
                                        <h5 class="subtitulo_cuenta">Referencias:</h5>
                                        <input type="text" class="form-control" placeholder="Entre Calle 1 y Calle 2">
                                    </div>
                                </div>
                            </div>


                        </fieldset>
                    </form>



                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Confirmar</button>
            </div>

        </div>


    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>


</html>