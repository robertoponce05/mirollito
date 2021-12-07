<?php
$iduser = $_SESSION['idusuario'];
if ($_SESSION['envio'] == 1) {
    $query = "SELECT * FROM tarjetas WHERE id_client=$iduser and estado='1'";
    $result = mysqli_query($conn, $query);
    $filas = mysqli_num_rows($result);
    if ($filas > 0) {
        if ($_SESSION['envio'] == 1) {
            $query = "SELECT * FROM tarjetas WHERE id_client=$iduser and estado='1'";
            $result_pago = mysqli_query($conn, $query);
?>
            
                
                <?php
                $interac = 1;
                while ($row = mysqli_fetch_array($result_pago)) {

                    $ccard = $row['ccard'];
                    $ccardi = substr($ccard, 0, 4) . '********';
                    $ccardi = $ccardi . substr($ccard, 12, 15);
                ?>
    <div class="form-check">
                    <input class="form-check-input" type="radio" name="check-metodo" id="tarjeta1" value="<?php echo $row['id_card']; ?>"
                    <?php if($row['principal']==1){ echo ' checked';}?>
                    >
                    <label class="form-check-label" for="tarjeta1">
                        Tarjeta <?php echo $row['alias'] . ' ' . $ccardi ?>
                    </label>
    </div>
                <?php
                } ?>
                <div class="row_espacio">

                    <a class="btn btn-outline-secondary" href="/cuenta.php?pill=3">Agregar o editar tarjetas</a>
                </div>
            <?php
        }
    } else { ?>
            <div class="">
                <h6 class="row_espacio">No cuentas con tarjetas</h6>
                <a class="btn btn-outline-secondary" href="/cuenta.php?pill=3">Agregar tarjeta</a>
            </div>
        <?php
    }

        ?>
            </div>
        <?php
    }

        ?>