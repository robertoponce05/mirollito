<?php include("includes/db.php");
$in = 4;
if ($_SESSION['nivel']==2) {
    $_SESSION['message'] = 'No tienes los permisos para realizar esta acción';
    $_SESSION['message_type'] = 'warning';
    header("location:sysadmin.php");
}else{
include("includes/header.php");  ?>

<div class="col-8 col-md-10 fullHeight bg_contenido">
    <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show " style="margin-bottom:0" role="alert">
            <?= $_SESSION['message']; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>

    <?php unset($_SESSION['message']);
        unset($_SESSION['message_type']);
    } ?>
    <div class="container">
        <div class="contenedor_cuadro">
            <div class="container salto">
                <h4 class="position-relative">Agregar usuario
                    <a class="btn d-inline-flex position-absolute start-100 translate-middle-x" data-bs-toggle="modal" data-bs-target="#addUser">
                        <h5 class="align-middle" style="padding: 2px; color: #681212">Agregar </h5><img src="img/add.png" alt="Agregar" style="width: 30px; height: 30px; margin-left: 5px; margin-right: 250px;">
                    </a>
                </h4>

            </div>
            <div class="container salto">
                <br>
                <table class="table salto">
                    <?php
                    $query = "SELECT usuario, activo, nivel, nombre, apellido, id_admin FROM sysadmin";
                    $result = mysqli_query($conn, $query);
                    ?>
                    <tr>
                        <th>Usuario</th>
                        <th>Roll</th>
                        <th>Estatus</th>
                        <th>Acciones</th>
                    </tr>

                    <?php
                    while ($row = mysqli_fetch_array($result)) {
                    ?><tr>
                            <td><?php echo $row['usuario']; ?></td>
                            <td><?php if ($row['nivel'] == 1){echo 'Admin Súper';}elseif($row['nivel'] == 2){echo 'Pedidos';}elseif($row['nivel'] == 3){echo 'Lectura';}?></td>
                            <td><?php if ($row['activo'] == 1){echo 'Activo';}else{echo 'Deshabilitado';} ?></td>
                            <td><button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#modal<?php echo $row['id_admin']; ?>">Ver más</button></td>
                        <?php
                        include('includes/generate_modal.php');
                    }
                    echo '</tr>';
                        ?>

                </table>


            </div>


        </div>
        <div class="modal fade" id="addUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addUserLabel">Nuevo empleado</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="includes/newUser.php" method="post">
                            <div class="row">
                                <div class="col-6">
                                    <label for="name" class="form-label">Nombre</label>
                                    <input type="text" id="name" class="form-control" name="nombre" required>


                                </div>
                                <div class="col-6">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" id="apellido" class="form-control" name="apellido" required>


                                </div>
                                <div class="col-6">
                                    <label for="usuario" class="form-label">Asigna un usuario</label>
                                    <input type="text" id="usuario" class="form-control" name="usuario" aria-describedby="passwordHelpBlock" required>
                                    <div id="passwordHelpBlock" class="form-text">
                                        Elige un nombre de usuario, este debe ser distinto a los existentes y con el iniciará sesión.
                                    </div>

                                </div>
                                <div class="col-6">
                                    <label for="rol" class="form-label">Rol</label>
                                    <!-- <select id="rol" class="form-control" name="rol" required>
                                    <div id="rol" class="form-text">
                                        1: Usuario super. 2: Permisos para pedidos. 3: Permiso de lectura.
                                    </div> -->
                                    <select name="rol" id='rol' class="form-select" aria-label="Default select example" required>
                                        <option selected>Selecciona una opción</option>
                                        <option value="1">Súper</option>
                                        <option value="2">Sección pedidos</option>
                                        <option value="3">Lectura</option>
                                    </select>

                                </div>
                                <div class="col-6">
                                    <label for="pass" class="form-label">Contraseña</label>
                                    <input type="password" id="pass" class="form-control" name="pass" required>
                                    <div id="pass" class="form-text">
                                        Deberá ser de mínimo 6 dígitos.
                                    </div>

                                </div>
                                <div class="col-6">
                                    <label for="repass" class="form-label">Contraseña</label>
                                    <input type="password" id="repass" class="form-control" name="repass" required>
                                    <div id="repass" class="form-text">
                                        Confirma tu contraseña.
                                    </div>

                                </div>


                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Agregar</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>


    </div>
</div>


<?php include('includes/footer.php'); } ?>