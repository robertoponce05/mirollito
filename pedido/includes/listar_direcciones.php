<?php
$iduser=$_SESSION['idusuario'];
if ($_SESSION['envio'] == 1) {
    $query = "SELECT * FROM direcciones WHERE idusuario=$iduser and habilitar=1";
    $result = mysqli_query($conn, $query);
    $filas = mysqli_num_rows($result);
    if ($filas > 0) {
        if ($_SESSION['envio'] == 1) {
            $query = "SELECT * FROM direcciones WHERE idusuario=$iduser and habilitar=1";
            $result_dir = mysqli_query($conn, $query);
?>
            <div class="col-12 row_espacio">
                <h4>Selecciona una dirección</h4>
                <?php
                $interac=1;
                while ($row = mysqli_fetch_array($result_dir)) {
                    
                ?>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="id_dir" id="tarjeta1" value="<?php echo $row['id_dir']; ?>" <?php if($interac==1){echo 'checked';}?>>
                        <label class="form-check-label" for="tarjeta1">
                            <span class="dir"><?php $interac=$interac+1; echo $row['alias'] . ': '; ?></span><?php echo $row['calle'] . ' ' . $row['exterior'] . ', ' . $row['cp']; ?>
                        </label>
                    </div>

                <?php
                } ?>
                <div class="col row_espacio">

                    <a class="btn btn-outline-secondary" href="/cuenta.php?pill=1">Agregar o editar direcciones</a>
                </div>
            <?php
        }
    } else { ?>
            <div class="col-12">
                <h6 class="row_espacio">No cuentas con direcciones</h6>
                <a class="btn btn-outline-secondary" href="/cuenta.php?pill=1">Agregar dirección</a>
            </div>
        <?php
    }

        ?>
            </div>
        <?php
    }

        ?>