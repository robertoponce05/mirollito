<div class="modal fade" id="modal<?php echo $row['id_admin']; ?>" tabindex="-1" aria-labelledby="modal<?php echo $row['id_admin']; ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal<?php echo $row['id_admin']; ?>">Detalle de "<?php echo $row['usuario']; ?>"</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="includes/editUser.php" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-6">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" id="name" class="form-control" name="nombre" value="<?php echo $row['nombre']; ?>" required>


                        </div>
                        <div class="col-6">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" id="apellido" class="form-control" name="apellido" value="<?php echo $row['apellido']; ?>" required>


                        </div>
                        <div class="col-6">
                            <label for="usuario" class="form-label">Asigna un usuario</label>
                            <input type="text" id="usuario" class="form-control" name="usuario" value="<?php echo $row['usuario']; ?>" aria-describedby="passwordHelpBlock" required>
                            <div id="passwordHelpBlock" class="form-text">
                                Elige un nombre de usuario, este debe ser distinto a los existentes y con el iniciará sesión.
                            </div>

                        </div>
                        <div class="col-6">
                            <label for="rol" class="form-label">Rol</label>
                            <!-- <input type="text" id="rol" class="form-control" name="rol" value="" required>
                            <div id="rol" class="form-text">
                                1: Usuario super. 2: Permisos para pedidos. 3: Permiso de lectura.
                            </div> -->

                            <select name="rol" id='rol' class="form-select" aria-label="Default select example" required>
                                <option >Selecciona una opción</option>
                                <option value="1" <?php if ($row['nivel'] == 1){echo 'selected';}?>>Súper</option>
                                <option value="2" <?php if ($row['nivel'] == 2){echo 'selected';}?>>Sección pedidos</option>
                                <option value="3" <?php if ($row['nivel'] == 3){echo 'selected';}?>>Lectura</option>
                            </select>

                        </div>
                        <div class="col-6">
                            <label for="pass" class="form-label">Contraseña</label>
                            <input type="password" id="pass" class="form-control" name="pass">
                            <div id="pass" class="form-text">
                                Deberá ser de mínimo 6 dígitos.
                            </div>
                            <input type="hidden" name="id" id="iduser" value="<?php echo $row['id_admin']; ?>">

                        </div>
                        <div class="col-6">
                            <label for="repass" class="form-label">Confirma tu contraseña</label>
                            <input type="password" id="repass" class="form-control" name="repass">
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