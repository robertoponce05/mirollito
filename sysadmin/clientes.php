<?php error_reporting(0);
include("includes/db.php");
$in = 3;
$page = 0;
include("includes/header.php");  ?>
<div class="col-8 col-md-10 fullHeight bg_contenido position-relative">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } ?>
    <div class="container contenedor_cuadro tabla__clientes">
        <div class="table-responsive ">
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
                    while ($row = mysqli_fetch_array($result_clientes)) { 
                        if($row['activo']==0){
                            $activo='class="id_desactivado"';
                        }else{
                            $activo="";
                        }
                        
                        ?>
                        <tr <?php echo $activo ?>>
                            <th><?php echo $row['idusuario'] ?></t>
                            <td><?php echo $row['nombre'] ?></td>
                            <td><?php echo $row['p_apellido'] ?>
                                <?php echo $row['s_apellido'] ?></td>
                            <td><?php echo $row['correo'] ?></td>
                            <td><?php echo $row['telefono'] ?></td>
                            <td>
                                <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info_usuario<?php echo $row['idusuario'] ?>">Ver más</button>
                                <!-- <button type="button" class="hover_a btn btn-outline- --><?php
                                                                                                if ($row['activo'] == 0) {
                                                                                                    echo '<a class="a__habilitar btn btn-outline-success" href="activa.php?action=1&id=' . $row['idusuario'] . '">Habilitar</a>';
                                                                                                } else {
                                                                                                    echo '<a class="a__des btn btn-outline-danger" href="activa.php?action=0&id=' . $row['idusuario'] . '">Desactivar</a>';
                                                                                                }
                                                                                                ?>
                                </button>
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
<?php
$query = "SELECT * FROM clientes";
$result_clientes = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($result_clientes)) {
    $iduser = $row['idusuario'];
?>
    <!-- modaldireciones -->
    <div class="modal fade" id="NuevaDireccion<?php echo $iduser; ?>" tabindex="-1" aria-labelledby="1NuevaDireccion<?php echo $iduser; ?>" aria-hidden="true">
        <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NuevaDireccion<?php echo $iduser; ?>">Agrega nueva dirección</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="includes/add_dir.php" method="POST">
                        <div class="container">
                            <div class="row">
                                <div class="container-sm">
                                    <h5 class="titulo_cuenta row_espacio">Ingresa tu nueva dirección</h5>
                                    <fieldset>
                                        <div class="mb-3">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-6">
                                                    <h5 class="subtitulo_cuenta">Alias: </h5>
                                                    <input type="text" class="form-control" placeholder="Casa" name="alias" required>
                                                </div>
                                            </div>
                                            <div class="row row_espacio">
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Código postal:</h5>
                                                    <input type="text" class="form-control" placeholder="" name="cp" maxlength="5" pattern="[0-9]{1,5}" required>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Colonia:</h5>
                                                    <input type="text" class="form-control" placeholder="" name="colonia" required>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Municipio:</h5>
                                                    <input type="text" class="form-control" placeholder="" name="municipio" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-3 row_espacio">
                                            <div class="row">
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Calle:</h5>
                                                    <input type="text" class="form-control" name="calle" required>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Exterior:</h5>
                                                    <input type="text" class="form-control" placeholder="" name="exterior" required>
                                                </div>
                                                <div class="col-4">
                                                    <h5 class="subtitulo_cuenta">Interior:</h5>
                                                    <input type="text" class="form-control" placeholder="" name="interior">
                                                </div>

                                                <div class="col-12">
                                                    <h5 class="subtitulo_cuenta">Referencias:</h5>
                                                    <input type="text" class="form-control" name="referencias" required>
                                                    <input type="hidden" name="idusu" value="<?php echo $iduser; ?>">
                                                </div>
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">

                    <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Agregar dirección</button>
                </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="info_usuario<?php echo $row['idusuario'] ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel<?php echo $row['idusuario'] ?>" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel<?php echo $row['idusuario'] ?>">Información de usuario</h5>
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
                                        <th scope="col">1r apeliido</th>
                                        <th scope="col">2r apeliido</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Celular</th>
                                        <th scope="col">Acción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>

                                        <form action="includes/rename.php" method="post">
                                            <th scope="row"><?php echo $row['idusuario'] ?></th>
                                            <td><input type="text" name="nombre" value="<?php echo $row['nombre'] ?>"> </td>
                                            <td><input type="text" name="p_ape" value="<?php echo $row['p_apellido']; ?>"></td>
                                            <td><input type="text" name="s_ape" value="<?php echo $row['s_apellido']; ?>"></td>
                                            <td><input type="text" name="mail" value="<?php echo $row['correo'] ?>"></td>
                                            <td><input type="text" name="tel" value="<?php echo $row['telefono'] ?>"></td>
                                            <td>
                                                <input type="hidden" name="idusu" value="<?php echo $row['idusuario']; ?>">
                                                <button class="btn btn-success">Guardar</button>

                                            </td>
                                        </form>
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
                                <div class="col-3 row_espacio d-flex"><a type="button" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#NuevaDireccion<?php echo $iduser; ?>"><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="44" height="44" viewBox="0 0 24 24" stroke-width="1.5" stroke="#000000" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="12" y1="5" x2="12" y2="19" />
                                            <line x1="5" y1="12" x2="19" y2="12" />
                                        </svg></a>
                                </div>


                                <div class="row">


                                    <?php
                                    $queryDir = "SELECT DISTINCT * FROM direcciones WHERE idusuario = $iduser and habilitar = 1 ORDER BY id_dir DESC;";
                                    $resDir = mysqli_query($conn, $queryDir);
                                    $filasDir = mysqli_num_rows($resDir);
                                    if ($filasDir > 0) {
                                        while ($row = mysqli_fetch_array($resDir)) {

                                            include('includes/showDir.php');
                                            include('includes/edit_dir.php');
                                        }
                                    } else {
                                    ?>
                                        <div class="col-9">
                                            <h3 class="titulo_cuenta row_espacio">No hay direcciones para mostrar</h3>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="row row_espacio">
                        <h4>Cards</h4>
                        <table class="col-sm-12 col-md-6">
                            <?php
                            $cards = "SELECT * FROM tarjetas WHERE id_client=$iduser";
                            $resCard = mysqli_query($conn, $cards);
                            $ncards = mysqli_num_rows($resCard);

                            if ($ncards > 0) {
                                $resCard = mysqli_query($conn, $cards);
                                while ($rcard = mysqli_fetch_array($resCard)) { ?>
                                    <tr>
                                        <td>
                                            <p><?php
                                                $cards = "";
                                                $ccardi = "";
                                                $ccard = $rcard['ccard'];
                                                $ccardi = substr($ccard, 0, 4) . '********';
                                                $ccardi = $ccardi . substr($ccard, 12, 15);
                                                echo $ccardi;
                                                ?></p>
                                        </td>
                                        <td><button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#info_usuario<?php echo $row['idusuario'] ?>">Delete</button></td>
                                    <tr>
                                <?php
                                }
                            } else {
                                echo '<tr><h5>Usuario sin tarjetas</h5></tr>';
                            }

                                ?>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <!--button type="button" class="btn btn-primary">Editar</button-->
                </div>
            </div>

        </div>
    </div>
<?php } ?>

<!--Nueva Dirección-->
<div class="modal fade" id="NuevaDireccion" tabindex="-1" aria-labelledby="NuevaDireccion" aria-hidden="true">
    <div class="modal-lg modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="NuevaDireccion">Agrega nueva dirección</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="includes/add_dir.php" method="POST">
                    <div class="container">
                        <div class="row">
                            <div class="container-sm">
                                <h5 class="titulo_cuenta row_espacio">Ingresa tu nueva dirección</h5>
                                <fieldset>
                                    <div class="mb-3">
                                        <div class="row">
                                            <div class="col-sm-12 col-md-6">
                                                <h5 class="subtitulo_cuenta">Alias: </h5>
                                                <input type="text" class="form-control" placeholder="Casa" name="alias" required>
                                            </div>
                                        </div>
                                        <div class="row row_espacio">
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Código postal:</h5>
                                                <input type="text" class="form-control" placeholder="" name="cp" maxlength="5" pattern="[0-9]{1,5}" required>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Colonia:</h5>
                                                <input type="text" class="form-control" placeholder="" name="colonia" required>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Municipio:</h5>
                                                <input type="text" class="form-control" placeholder="" name="municipio" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-3 row_espacio">
                                        <div class="row">
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Calle:</h5>
                                                <input type="text" class="form-control" name="calle" required>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Exterior:</h5>
                                                <input type="text" class="form-control" placeholder="" name="exterior" required>
                                            </div>
                                            <div class="col-4">
                                                <h5 class="subtitulo_cuenta">Interior:</h5>
                                                <input type="text" class="form-control" placeholder="" name="interior">
                                            </div>

                                            <div class="col-12">
                                                <h5 class="subtitulo_cuenta">Referencias:</h5>
                                                <input type="text" class="form-control" name="referencias" required>
                                                <input type="hidden" value="<?php $row['idusuario']; ?>" </div>
                                            </div>
                                        </div>

                                </fieldset>




                            </div>


                        </div>
                    </div>
            </div>
            <div class="modal-footer">

                <button type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal" data-bs-target="#success">Agregar dirección</button>
            </div>
            </form>
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